<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Auction;
use Auth;
use App\Product;
use App\User;
use Carbon\Carbon;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userInfo=DB::table('users')->where('id', Auth::user()->id)->first();

        $userBids = DB::table('biddings')->where('user_id', Auth::user()->id)->groupby('auction_id')->get(['auction_id']);
        $array=array();
        foreach ($userBids as $bid){
          $auction= Auction::find($bid->auction_id);
          $carbon= new Carbon();

          if ($auction->date_end > $carbon){
            $array[]=$auction;
          }
        }

        return view('client.home', ['win' => $array, 'user'=>$userInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
         // Obtenir l'usuari.
         $user = User::findOrFail($id);
         // Si el camp Password és null (no és required).
         if ($request['password'] != null) {
             // Encriptar password en cas de que s'hagi inserit.
             $request['password'] = bcrypt($data['password']);
         } else {
             // Treiem del array $data en cas de que no s'hagi inserit.
             unset($request['password']);
         }

         // Actualitzar l'usuari.
         $user->update($request->all());
         // Vista on es llisten els usuaris.
         return redirect()->action('UserProfileController@index');
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
