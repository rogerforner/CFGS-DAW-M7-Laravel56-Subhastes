<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Stock extends Model
{
    protected $table = 'stock';
    protected $fillable = ['product_id','available','reference'];

    public function product($id){
        $product = Product::find($id)->get();
        return $product[0];
    }
}
