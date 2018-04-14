<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Auction;

class CategoryClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->with(['categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $now = date("Y-m-d H:i:s");

        $activeAuctions = Auction::where('date_end', '>=', $now)->get();
        foreach($activeAuctions as $activeAuction){
            $activeAuction->category = $activeAuction->getCategory($activeAuction->stock_id,$id);
            $activeAuction->product = $activeAuction->getProduct($activeAuction->stock_id);
        }

        $finishedAuctions = Auction::where('date_end', '<', $now)->get();
        foreach($finishedAuctions as $finishedAuction){
            $finishedAuction->category = $finishedAuction->getCategory($finishedAuction->stock_id,$id);
            $finishedAuction->product = $finishedAuction->getProduct($finishedAuction->stock_id);
        }

        return view('categories.show')->with(['activeAuctions' => $activeAuctions, 'finishedAuctions' => $finishedAuctions]);
    }
}
