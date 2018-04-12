<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Product;
use App\User;
use Carbon\Carbon;
use App\Auction;
use Auth;
//-------------------------
//All Paypal Details class
//-------------------------
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaymentController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        //------------------------
        //setup PayPal api context
        //------------------------
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function addPayment()
    {
        return view('addPayment');
    }

    public function postPaymentWithpaypal(Request $request)
{
  Session::put('user_id',$request->input('user_id'));
  Session::put('address',$request->input('address'));
  Session::put('amount',$request->input('amount'));
    $payer = new Payer();
    $payer->setPaymentMethod('paypal');
  $item_1 = new Item();
    $item_1->setName('PayToPlay Order')
        ->setCurrency('EUR')
        ->setQuantity(1)
        ->setPrice($request->get('amount'));
    $item_list = new ItemList();
    $item_list->setItems(array($item_1));
    $amount = new Amount();
    $amount->setCurrency('EUR')
        ->setTotal($request->get('amount'));
    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($item_list)
        ->setDescription('Your transaction description');
    $redirect_urls = new RedirectUrls();
    $redirect_urls->setReturnUrl(URL::route('status'))
        ->setCancelUrl(URL::route('status'));
    $payment = new Payment();
    $payment->setIntent('Sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));
    try {
        $payment->create($this->_api_context);
    } catch (\PayPal\Exception\PPConnectionException $ex) {
        if (\Config::get('app.debug')) {
            return Redirect::route('paypalerror');
        } else {
            return Redirect::route('paypalerror');
        }
    }
    foreach($payment->getLinks() as $link) {
        if($link->getRel() == 'approval_url') {
            $redirect_url = $link->getHref();
            break;
        }
    }
    Session::put('paypal_payment_id', $payment->getId());
    if(isset($redirect_url)) {

        return Redirect::away($redirect_url);
    }
  return redirect()->route('paypalerror');
}
public function getPaymentStatus(Request $request)
{
    $payment_id = Session::get('paypal_payment_id');
    $user_id = Session::get('user_id');
    $address = Session::get('address');
    Session::forget('paypal_payment_id');
    if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        return Redirect::route('paypalerror');
    }
    $payment = Payment::get($payment_id, $this->_api_context);
    $execution = new PaymentExecution();
    $execution->setPayerId(Input::get('PayerID'));
    $result = $payment->execute($execution, $this->_api_context);
    if ($result->getState() == 'approved') {
        //Aqui es on imprimirem la factura
        //Areturn redirect()->route('paywithpaypal', array('address' => $address, 'user_id' => $user_id));
        $user=DB::table('users')->where('id', Auth::user()->id)->first();
        $userBids = DB::table('biddings')->where('user_id', Auth::user()->id)->groupby('auction_id')->get(['auction_id']);
        $userBids1 = DB::table('biddings')->where('user_id', Auth::user()->id)->get();
        $array1=array();
        foreach ($userBids1 as $bid){
          $auction= Auction::find($bid->auction_id);
          $auctionWiner = DB::table('auction_has_winner')->get(['bidding_id']);
          foreach ($auctionWiner as $auction1){
            $carbon= new Carbon();

            if ($auction->date_end < $carbon && $auction1->bidding_id==$bid->id){
              $array1[]=$auction;
            }
          }
        }

        $array=array();
        foreach ($userBids as $bid){
          $auction= Auction::find($bid->auction_id);
          $carbon= new Carbon();

          if ($auction->date_end > $carbon){
            $array[]=$auction;
          }
        }

        $array=collect($array);

        $array1=collect($array1);

        $page = (Paginator::resolveCurrentPage( ));

        $perPage = 8;

        $win = (new LengthAwarePaginator(
            $array->forPage($page, $perPage), $array->count(), $perPage, $page)
        )->withPath('');
        $win1 = (new LengthAwarePaginator(
            $array1->forPage($page, $perPage), $array1->count(), $perPage, $page)
        );
        User::where('id',Auth::user()->id)->update([
          'cash' => $user->cash+Session::get('amount')
        ]);
        return view('client.home', ['win' => $win, 'user'=>$user, 'win1' => $win1]);
    }
return Redirect::route('paypalerror');
}
public function error(){
    return view('errors.404');
}
}
