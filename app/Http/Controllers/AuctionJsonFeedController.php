<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;

class AuctionJsonFeedController extends Controller
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

        $data = [
          'version' => 'https://jsonfeed.org/version/1',
          'title' => 'M7 DAW, Institut Montsià: Auctions',
          'home_page_url' => 'http://127.0.0.1:8000/',
          'feed_url' => 'http://127.0.0.1:8000/feed',
          'icon' => 'http://127.0.0.1:8000/apple-touch-icon.png',
          'favicon' => 'http://127.0.0.1:8000/apple-touch-icon.png',
          'items' => [],
        ];

        foreach ($activeAuctions as $key => $activeAuction) {
            $data['items'][$key] = [
            'id' => $activeAuction->id,
            'title' => $activeAuction->name,
            'url' => 'http://127.0.0.1:8000/'.$activeAuction->uri,
            'image' => $activeAuction->description,
            'content_html' => $activeAuction->price,
            'date_created' => $activeAuction->created_at->tz('UTC')->toRfc3339String(),
            'date_modified' => $activeAuction->updated_at->tz('UTC')->toRfc3339String()
          ];
        }

        return $data;
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
        //
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
