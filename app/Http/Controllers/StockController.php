<?php

namespace App\Http\Controllers;

use Auth;
use App\Stock;
use App\Product;
use Illuminate\Http\Request;

class StockController extends Controller
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
        $products = Product::all();
        foreach ($products as $product) {
            $product->stock = $product->stock($product->id);
            $product->stotal = Stock::where('product_id',$product->id)->where('available',1)->count();
        }
        
        return view('admin.stock.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Si no hi ha productes creats no deixem crear stock. EN cas contrari
        // permetem crear-ne.
        $products = Product::all();
        if(sizeof($products) == 0){
            session()->flash('warning','You must insert products before create a stock!');
            return redirect()->action('StockController@index');
        } else {
          return view('admin.stock.create', compact('products'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar dades obtingudes del formulari.
        $data = $request->validate([
            'numProducts' => 'required|integer',
            'product'     => 'required|integer',
        ]);

        if ($data['product'] != 0 || $data['numProducts'] > 0) {
          // Crear tants stocks del producti com s'hagin detrminat.
          while ($data['numProducts'] > 0) {
              // Crear una referència de forma automàtica i única a la DB.
              do {
                  $reference = str_random(24);
              } while (Stock::where("reference", "=", $reference)->first() instanceof Stock);

              Stock::create([
                  'product_id' => $data['product'],
                  'reference'  => $reference,
              ]);

              $data['numProducts']--;
          }
        } else {
          session()->flash('warning','Select a product and add a stock greater than 0!');
          return redirect()->action('StockController@create');
        }

        // Vista amb el llistat de categories.
        return redirect()->action('StockController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::findOrFail($id);
        $product = Product::findOrFail($stock->product_id);

        return view('admin.stock.show', compact(['stock', 'product']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        $product = Product::findOrFail($stock->product_id);

        return view('admin.stock.edit', compact(['stock', 'product']));
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
        // Obtenir l'stock.
        $stock = Stock::findOrFail($id);

        // Validar dades obtingudes del formulari.
        $data = $request->validate([
            'stock' => 'required|integer',
        ]);

        // Si l'stock dels productes és diferent a 0 vol dir que hi ha existències.
        // En cas contrari, que no n'hi ha.
        if ($data['stock'] >= 1) {
            $data['available'] = true;
        } else {
            $data['available'] = false;
        }

        // dd($data);

        // Actualitzar l'stock (la validació ha sortit bé).
        $stock->update($data);

        // Vista amb el llistat de categories.
        return redirect()->action('StockController@index');
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
