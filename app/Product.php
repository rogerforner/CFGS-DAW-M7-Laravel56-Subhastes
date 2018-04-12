<?php

namespace App;

use App\Stock;
use Illuminate\Database\Eloquent\Model;
use DB;
use Category;

class Product extends Model
{
    protected $fillable = ['name','description','characteristics','image','price'];

    public function registerCategories($id, $categories)
    {
        DB::table('product_has_category')->where('product_id', '=', $id)->delete();
        for ($i = 0; $i < count($categories); $i++) {
            DB::table('product_has_category')->insert([
                'product_id' => $id,
                'category_id' => $categories[$i]
            ]);
        }
    }

    public function getCategories($id)
    {
        $cat_names = "";
        $categories = DB::table('product_has_category')->where('product_id', '=', $id)->get(['category_id']);
        for ($i = 0; $i < count($categories); $i++) {
            $name = DB::table('categories')->where('id', '=', $categories[$i]->category_id)->get(['name']);
            $cat_names = $cat_names.$name[0]->name.", ";
        }
        $cat_names = substr($cat_names, 0, -2);
        return $cat_names;
    }

    public function createStock($productId)
    {
        // Crear referència de forma automàtica.
        do {
            $reference = str_random(12);
        } while (Stock::where("reference", "=", $reference)->first() instanceof Stock);

        // Crear un stock per al producte afegit. Aquest serà igual a 0 ja que
        // amb la creació del producte només es determina l'existència d'aquest,
        // no la quantitat.
        Stock::create([
        'product_id' => $productId,
        'reference'  => $reference,
        // 'available'  => $data[''], // Default false
        // 'stock'      => $data[''], // Default 0
      ]);
    }
}
