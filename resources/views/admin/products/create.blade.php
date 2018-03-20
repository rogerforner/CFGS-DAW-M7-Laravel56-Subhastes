@extends('layouts.admin')
@section('title', 'Un títol')
@section('description', 'Una descripció')
@section('content')

<div class="row my-3">
  <div class="col-10 col-sm-10 col-md-6 mx-auto">
    <div class="card">
      <h5 class="card-header">Create new product</h5>
      <div class="card-body">
        {{Form::open}}
      </div>
    </div><!-- /.card -->
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection