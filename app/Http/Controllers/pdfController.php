<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Auction;
use App\Product;
use App\Stock;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\collectionChild;
use Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use PDF;
class pdfController extends Controller
{
  public function index($id)
  {
    $auction=DB::table('auctions')->where('id',$id)->first();
      $userInfo=DB::table('users')->where('id', Auth::user()->id)->first();
      $stock= Stock::find($auction->stock_id)->first();
      $product= Product::find($stock->product_id);
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
      $pdf=PDF::loadView('layouts.pdf.auction',compact('auction','userInfo','product'));

      return $pdf->download('layouts.pdf.auction.pdf');
  }
}
