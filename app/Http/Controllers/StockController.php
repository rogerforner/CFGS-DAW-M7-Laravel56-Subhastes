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
        $stocks = Stock::all();
        foreach ($stocks as $stock) {
            $stock->product = $stock->product($stock->product_id);
        }

        return view('admin.stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // L'stock es crea de forma automàtica quan es crea un producte, a través
        // de app\Product.php, funció createStock($productId).

        // Quan es crea un producte es genera un stock amb valors:
        // - product_id: id del producte passat per paràmetre.
        // - reference: generada automàticament, str_random(24).
        // - available: per defecte "false".
        // - stock: per defecte 0.
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
        // L'stock s'elimina de forma automàtica quan s'elimina un producte, a través
        // de app\Product.php, funció destroyStock($productId).
    }
}
