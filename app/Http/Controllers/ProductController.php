<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use DB;

use Illuminate\Http\Request;

class ProductController extends Controller
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
        $cat_names = [];
        $products = Product::paginate(6);
        foreach($products as $prod){
            $names = $prod->getCategories($prod->id);
            $cat_names[$prod->id] = $names;
        }
        
        return view('admin.products.index')->with(['products' => $products, 'categories' => $cat_names]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        $categories = Category::all();
        return view('admin.products.partials.form')->with(['categories'=>$categories,'product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name','description','characteristics');
        $image = $request->file('image');

        $path = 'Product_'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $image->move($destinationPath, $path);
        $r=(string)$request->root().'/images/'.''.$path;
        $data = array_merge($data, array('image' => $r));
        
        $product = Product::create($data);
        $product->registerCategories($product->id, $request->only('categories')['categories']);
        
        session()->flash('success','Product created succesfully!');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $old_cats = DB::table('product_has_category')->where('product_id',$id)->get(['category_id']);
        $old_cats_array = [];
        foreach($old_cats as $old){
            $old_cats_array[] = $old->category_id;
        }
        return view('admin.products.partials.form')->with(['product' => $product, 'categories' => $categories, 'old_cats' => $old_cats_array]);
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
        $data = $request->only('name','description','characteristics');
        $image = $request->file('image');

        if($image !== NULL){
            $path = 'Product_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $path);
            $r=(string)$request->root().'/images/'.''.$path;
            $data = array_merge($data, array('image' => $r));
        }
        
        $product = Product::find($id);
        $product->update($data);
        $product->registerCategories($product->id, $request->only('categories')['categories']);
        
        session()->flash('success','Product updated succesfully!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product_has_category')->where('product_id','=',$id)->delete();
        Product::destroy($id);
        session()->flash('success','Product succesfully deleted!');
        return redirect()->route('products.index');
    }
}
