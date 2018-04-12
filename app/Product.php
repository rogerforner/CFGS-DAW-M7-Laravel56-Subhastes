<?php

namespace App;

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
}
