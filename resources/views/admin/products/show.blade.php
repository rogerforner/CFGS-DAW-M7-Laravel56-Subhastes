@extends('layouts.admin')

@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="card shadow-2">
        <div class="card-body">
          <h5 class="card-title">Product info</h5>
          {{-- Dades --}}
          <dl class="row">
            <dt class="col-sm-2">Name</dt>
            <dd class="col-sm-10">{{ $product->name }}</dd>

            <dt class="col-sm-2">Description</dt>
            <dd class="col-sm-10">{{ $product->description }}</dd>

            <dt class="col-sm-2">Characteristics</dt>
            <dd class="col-sm-10">{{ $product->characteristics }}</dd>

            <dt class="col-sm-2">Image</dt>
            <dd class="col-sm-10">{{ $product->image }}</dd>

            <dt class="col-sm-2">Created at</dt>
            <dd class="col-sm-10">{{ $product->created_at }}</dd>

            <dt class="col-sm-2">Updated at</dt>
            <dd class="col-sm-10">{{ $product->updated_at }}</dd>
          </dl>
          {{-- Tornar enrere --}}
          <p class="text-right">
            <a href="{{ action('ProductController@index') }}" class="card-link">
              <i class="far fa-arrow-alt-circle-left"></i> Go back
            </a>
          </p>
        </div>
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
</div>
@endsection
