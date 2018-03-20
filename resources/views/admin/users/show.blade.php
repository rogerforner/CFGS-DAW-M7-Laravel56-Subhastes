@extends('layouts.app')

@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="card shadow-2">
        <div class="card-body">
          <h5 class="card-title">Dades de l'usuari</h5>
          {{-- Dades --}}
          <dl class="row">
            <dt class="col-sm-2">Nom</dt>
            <dd class="col-sm-10">{{ $user->name }}</dd>

            <dt class="col-sm-2">Correu electrònic</dt>
            <dd class="col-sm-10">{{ $user->email }}</dd>

            <dt class="col-sm-2">Creat el</dt>
            <dd class="col-sm-10">{{ $user->created_at }}</dd>

            <dt class="col-sm-2">Actualitzat el</dt>
            <dd class="col-sm-10">{{ $user->updated_at }}</dd>
          </dl>
          {{-- Tornar enrere --}}
          <p class="text-right">
            <a href="{{ action('UserController@index') }}" class="card-link">
              <i class="far fa-arrow-alt-circle-left"></i> Tornar
            </a>
          </p>
        </div>
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
</div>
@endsection
