@extends('layouts.app')
@section('title', 'Categories')
@section('description', 'Totes')
@section('content')

<div class="container my-5">
    <div class="row">
        @foreach ($categories as $categoria)
            <div class="col-6 col-md-3 text-center">
                <div class="category-box">
                    <a href="{{route('categories.show',['id' => $categoria->id])}}">{{$categoria->name}}</a>    
                </div>
            </div>
        @endforeach
    </div>
</div><!-- /.container -->

@endsection
