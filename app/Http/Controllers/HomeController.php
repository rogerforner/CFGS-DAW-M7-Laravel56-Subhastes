<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Auction;
use App\Product;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\collectionChild;
use Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userInfo=DB::table('users')->where('id', Auth::user()->id)->first();
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

        $paginator = (new LengthAwarePaginator(
            $array->forPage($page, $perPage), $array->count(), $perPage, $page)
        )->withPath('');
        $paginator1 = (new LengthAwarePaginator(
            $array1->forPage($page, $perPage), $array1->count(), $perPage, $page)
        );
        return view('client.home', ['win' => $paginator, 'user'=>$userInfo, 'win1' => $paginator1]);
    }
}
