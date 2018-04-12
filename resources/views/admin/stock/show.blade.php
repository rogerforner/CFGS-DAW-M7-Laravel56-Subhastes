@extends('layouts.admin')
@section('title', $product->name.' info.')
@section('description', 'Information of the stock.')
@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="card shadow-2">
        <div class="card-body">
          <h5 class="card-title">Stock info.</h5>
          {{-- Informació --}}
          <dl class="row">
            <dt class="col-sm-2">Name</dt>
            <dd class="col-sm-10">{{ $product->name }}</dd>

            <dt class="col-sm-2">Stock</dt>
            <dd class="col-sm-10">{{ $stock->stock }}</dd>

            <dt class="col-sm-2">Available</dt>
            <dd class="col-sm-10">{{ $stock->available == 0 ? "No stock" : "Available" }}</dd>

            <dt class="col-sm-2">Description</dt>
            <dd class="col-sm-10">{{ $product->description }}</dd>

            <dt class="col-sm-2">Created at</dt>
            <dd class="col-sm-10">{{ $stock->created_at }}</dd>

            <dt class="col-sm-2">Updated at</dt>
            <dd class="col-sm-10">{{ $stock->updated_at }}</dd>
          </dl>

          {{-- Tornar enrere --}}
          <p class="text-right">
            <a href="{{ action('StockController@index') }}" class="card-link">
              <i class="far fa-arrow-alt-circle-left"></i> Go back
            </a>
          </p>
        </div>
      </div><!-- /.card -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container -->
@endsection
