<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auction;
use App\Product;
use App\Stock;
use DB;

class AuctionAdminController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auction::where('active',true)->paginate(6);
        foreach($auctions as $auction){
            $auction->product = $auction->getProduct($auction->stock_id);
            if($auction->getWinner($auction->id) != NULL){
                $auction->winner_id = $auction->getWinner($auction->id);
            }else{
                $auction->winner_id = NULL;
            }
        }
        return view('admin.auctions.index')->with(['auctions' => $auctions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auction = new Auction;
        $stocks = Stock::where('available','1')->get();
        if(sizeof($stocks) == 0){
            session()->flash('warning','You must insert available stock before create an auction!');
            return redirect()->route('auctions.index');
        }
        return view('admin.auctions.partials.form')->with(['auction' => $auction, 'stocks' => $stocks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_d = $request->only('title','description','stock_id','date_start','date_end');
        $request_d['date_start'] = str_replace('T',' ',$request_d['date_start']);
        $request_d['date_end'] = str_replace('T',' ',$request_d['date_end']);
        
        $new_auction = Auction::create($request_d);
        $current_date = date('Y-m-d H:i:s');
        DB::table('auction_has_winner')->insert([
            'auction_id' => $new_auction->id,
            'created_at' => $current_date,
            'updated_at' => $current_date
        ]);
        
        Stock::where('id',$new_auction->stock_id)->update([
            'available' => 0
        ]);

        session()->flash('success','Auction succesfully created!');
        return redirect()->route('auctions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auction = Auction::where('id',$id)->get();
        $auction[0]->product = $auction[0]->getProduct($auction[0]->stock_id);
        if($auction[0]->getWinner($auction[0]->id) != NULL){
            $auction[0]->winner_id = $auction[0]->getWinner($auction[0]->id);
        }else{
            $auction[0]->winner_id = NULL;
        }
        return view('admin.auctions.show')->with(['auction' => $auction[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auction = Auction::find($id);
        Stock::where('id',$auction->stock_id)->update([
            'available' => 1
        ]);
        $stocks = Stock::where('available','1')->get();

        return view('admin.auctions.partials.form')->with(['auction' => $auction, 'stocks' => $stocks]);
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
        $request_d = $request->only('title','description','stock_id','date_start','date_end');
        $request_d['date_start'] = str_replace('T',' ',$request_d['date_start']);
        $request_d['date_end'] = str_replace('T',' ',$request_d['date_end']);
        Auction::where('id',$id)->update($request_d);

        $auction = Auction::find($id);
        Stock::where('id',$auction->stock_id)->update([
            'available' => 0
        ]);
        session()->flash('success','Auction succesfully created!');
        return redirect()->route('auctions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auction::where('id',$id)->update([
            'active' => false
        ]);
        session()->flash('success','Auction succesfully deleted!');
        return redirect()->route('auction.index');
    }
}
