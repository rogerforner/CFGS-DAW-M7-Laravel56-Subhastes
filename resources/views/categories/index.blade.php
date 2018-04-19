@extends('layouts.app')
@section('title', 'Categories')
@section('description', 'Totes')
@section('content')

<div class="container my-5">
    <h2>Categories</h2>
    <div class="mt-4 row">
        @foreach ($categories as $categoria)
            <div class="col-12 col-md-3 text-center category-box">
                <a href="{{route('categories.show',['id' => $categoria->id])}}">{{$categoria->name}}</a>    
            </div>
        @endforeach
    </div>
</div><!-- /.container -->

@endsection
