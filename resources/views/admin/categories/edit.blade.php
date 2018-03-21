@extends('layouts.admin')
@section('title', 'Create a category.')
@section('description', 'Create a new category.')
@section('content')

  <div class="container my-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Create a new category</h5>

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
            {{ Form::model($category, ['action' => ['CategoryController@update', $category->id], 'method' => 'patch']) }}
              @include('admin.categories.partials.form', [
                'submitButton' => 'Update Category'
              ])
            {{ Form::close() }}

          </div>
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->

@endsection
