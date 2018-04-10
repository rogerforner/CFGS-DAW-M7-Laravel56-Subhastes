@extends('layouts.admin')

@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="card shadow-2">
        <div class="card-body">
          <h5 class="card-title">User info</h5>
          <hr>
          {{-- Dades --}}
          <dl class="row">
            <dt class="col-sm-2">Nickname</dt>
            <dd class="col-sm-10">{{ $user->nickname }}</dd>

            <dt class="col-sm-2">Name</dt>
            <dd class="col-sm-10">{{ $user->name }}</dd>

            <dt class="col-sm-2">Surname</dt>
            <dd class="col-sm-10">{{ $user->surname }}</dd>

            <dt class="col-sm-2">E-mail</dt>
            <dd class="col-sm-10">{{ $user->email }}</dd>

            <dt class="col-sm-2">Created at</dt>
            <dd class="col-sm-10">{{ $user->created_at }}</dd>

            <dt class="col-sm-2">Updated at</dt>
            <dd class="col-sm-10">{{ $user->updated_at }}</dd>
          </dl>
          {{-- Tornar enrere --}}
          <p class="text-right">
            <a href="{{ action('UserController@index') }}" class="card-link">
              <i class="far fa-arrow-alt-circle-left"></i> Go back
            </a>
          </p>
        </div>
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
</div>
@endsection
