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
        return view('index');
    }
return Redirect::route('paypalerror');
}
public function error(){
    return view('errors.404');
}
}
