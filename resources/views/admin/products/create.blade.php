@extends('layouts.admin')
@section('title', 'Un títol')
@section('description', 'Una descripció')
@section('content')

<div class="row my-3">
    <div class="col-10 col-sm-10 col-md-6 mx-auto">
        <div class="card">
            <h5 class="card-header">Create new product</h5>
            <div class="card-body">
            @if($product->exists)
                {{Form::open(['url' => '/admin/products'])}}   
            @else
                {{Form::open(['url' => "/admin/products/$product->id"])}}
            @endif
                {{Form::token()}}
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name',$product->name or old('name'),['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description',$product->description or old('description'),['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('characteristics', 'Characteristics')}}
                    {{Form::textarea('characteristics',$product->characteristics or old('characteristics'),['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('image', 'Image')}}
                    {{Form::file('image',['class' => 'form-control'])}}
                </div>
                <div class="form-group">

                </div>
                {{Form::close()}}
            </div>
        </div><!-- /.card -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection