@extends('layouts.admin')
@section('title', 'Create the stock.')
@section('description', 'Create the stock.')
@section('content')

  <div class="container my-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Create the stock.</h5>

            {{-- Warning --}}
            @if (session('warning'))
              <div class="alert alert-warning alert-dismissible fade show">
                {{ session('warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif

            {{-- Formulari --}}
            {{ Form::open(['action' => 'StockController@store', 'method' => 'post']) }}
              @include('admin.stock.partials.form', [
                'submitButton' => 'Create Stock'
              ])
            {{ Form::close() }}

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
