<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    protected $fillable = ['name','description','characteristics','image'];

    public function registerCategories($id,$categories){
        DB::table('product_has_category')->where('product_id', '=', $id)->delete();
        for($i = 0; $i < count($categories); $i++){
            DB::table('product_has_category')->insert([
                'product_id' => $id,
                'category_id' => $categories[$i]
            ]);
        }        
    }
}
