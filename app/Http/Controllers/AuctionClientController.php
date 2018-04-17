<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;
use Auth;

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
        return view('auctions.show')->with(['auction' => $auction[0]]);
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
        //
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
