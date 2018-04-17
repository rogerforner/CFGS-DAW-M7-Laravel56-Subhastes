<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;
use Auth;
use DB;

class AuctionClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = date("Y-m-d H:i:s");

        $activeAuctions = Auction::where('date_end', '>=', $now)->get();
        foreach($activeAuctions as $activeAuction){
            $activeAuction->product = $activeAuction->getProduct($activeAuction->stock_id);
        }

        $finishedAuctions = Auction::where('date_end', '<', $now)->get();
        foreach($finishedAuctions as $finishedAuction){
            $finishedAuction->product = $finishedAuction->getProduct($finishedAuction->stock_id);
        }

        return view('index', compact(['activeAuctions', 'finishedAuctions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::guest()){
            return redirect()->route('login');
        }
        $auction = Auction::where('id',$id)->get();
        $total_bids = DB::table('biddings')->where('auction_id',$id)->count();
        $winner = $auction[0]->getWinner($auction[0]->id);
        $user_id = Auth::user()->id;
        if($winner == NULL){
            $status = "No Winner";
            $color = "orange";
        }else if($winner->id == $user_id){
            $status = "Winning";
            $color = "green";
        }else{
            $status = "Losing";
            $color = "crimson";
        }

        return view('auctions.show')->with(['auction' => $auction[0], 'color' => $color,'total_bids' => $total_bids,'status'=>$status]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd(DB::table('biddings')->select('amount',DB::Raw('COUNT(amount) as count'))->groupBy('amount')->havingRaw('COUNT(amount) = 1')->orderBy('amount','ASC')->limit(1)->get());

        $_BID_TAX = 0.5;
        $auction = Auction::find($id)->get();
        $qty = $request->only('qty');
        $qty['qty'] = number_format($qty['qty'],2,',','');
        $actual_cash = Auth::user()->cash;
        $rest_cash = Auth::user()->cash - $_BID_TAX;
        DB::table('users')->where('id',Auth::user()->id)->update([
            'cash' => $rest_cash
        ]);
        
        $qty['qty'] = str_replace(',','.',$qty['qty']);
        
        DB::table('biddings')->insert([
            'user_id' => Auth::user()->id,
            'amount' => $qty['qty'],
            'auction_id' => $id
        ]);

        $min_bid = DB::table('biddings')->select('amount',DB::Raw('COUNT(amount) as count'))->groupBy('amount')->havingRaw('COUNT(amount) = 1')->orderBy('amount','ASC')->limit(1)->get();
        //echo "<script>console.log($min_bid)</script>";
        if(sizeof($min_bid) == 0){
            DB::table('auction_has_winner')->where('auction_id',$id)->update([
                'bidding_id' => NULL
            ]);
        }else if($min_bid[0]->amount != $qty['qty'] && $min_bid[0]->amount > $qty['qty']){
            $new_bidding = DB::table('biddings')->where('auction_id',$id)->orderBy('id','DESC')->limit(1)->get();
            DB::table('auction_has_winner')->where('auction_id',$id)->update([
                'bidding_id' => $new_bidding[0]->id
            ]);
        }else if($min_bid[0]->amount == $qty['qty']){
            $new_bidding = DB::table('biddings')->where('auction_id',$id)->orderBy('id','DESC')->limit(1)->get();
            DB::table('auction_has_winner')->where('auction_id',$id)->update([
                'bidding_id' => $new_bidding[0]->id
            ]);
        }
        return redirect()->route('auction.show',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
