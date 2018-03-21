<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name'        => 'required|string|max:255',
            'description' => 'max:255',
        ]);

        // Crear la categoria (la validació ha sortit bé).
        $user = Category::create([
            'name'        => $data['name'],
            'description' => $data['description'],
        ]);

        // Vista amb el llistat de categories.
        return redirect()->action('CategoryController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtenir la categoria.
        $category = Category::findOrFail($id);

        // Vista d'edició.
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtenir la categoria.
        $category = Category::findOrFail($id);

        // Vista d'edició.
        return view('admin.categories.edit', compact('category'));
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
        // Obtenir la categoria.
        $category = Category::findOrFail($id);

        // Validar dades obtingudes del formulari.
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'max:255',
        ]);

        // Actualitzar la categoria (la validació ha sortit bé).
        $category->update($data);

        // Vista amb el llistat de categories.
        return redirect()->action('CategoryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtenir la categoria.
        $category = Category::findOrFail($id);

        // Eliminar l'usuari.
        $category->delete();

        // Vista on es llisten els usuaris.
        return back()->with('success', "Category \"$category->name\" removed!");
    }
}
