@extends('layouts.admin')
@section('title', 'Modify the stock.')
@section('description', 'Modify the stock.')
@section('content')

  <div class="container my-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Modify the stock</h5>

            {{-- Errors --}}
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            {{-- Formulari --}}
            {{ Form::model($stock, ['action' => ['StockController@update', $stock->id], 'method' => 'patch']) }}
              @include('admin.stock.partials.form', [
                'submitButton' => 'Update Stock'
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
