@extends('layouts.admin')
@section('title', 'List of categories.')
@section('description', 'A list of categories for products and auctions.')
@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">List of all categories</h5>

          {{-- Warning --}}
          @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show">
              {{ session('warning') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          {{-- Success --}}
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          {{-- Taula d'usuaris --}}
          <div class="table-responsive">
            <table class="table table-hover mt-4">
              <thead class="bg-dark text-white">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($categories as $category)
                  <tr>
                    <td class="align-middle">{{ $category->id }}</td>
                    <td class="align-middle">{{ $category->name }}</td>
                    <td class="align-middle">{{ $category->description }}</td>
                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Accions">
                        {{-- Veure --}}
                        <a class="btn btn-primary btn-sm" href="{{ action('CategoryController@show', ['id' => $category->id]) }}" role="button"
                           data-toggle="tooltip" data-placement="top" title="See">
                          <i class="fas fa-eye"></i>
                        </a>
                        {{-- Editar --}}
                        <a class="btn btn-success btn-sm" href="{{ action('CategoryController@edit', ['id' => $category->id]) }}" role="button"
                           data-toggle="tooltip" data-placement="top" title="Edit">
                          <i class="fas fa-edit"></i>
                        </a>
                        {{-- Eliminar --}}
                        <a class="btn btn-danger btn-sm rounded-right" role="button" href="" data-tooltip="tooltip" data-placement="top" title="Delete"
                           data-toggle="modal" data-target="#deleteCategory-{{ $category->id }}">
                          <i class="fas fa-trash"></i>
                        </a>
                        @include('admin.categories.partials.modal', [
                          'id'          => $category->id,
                          'name'        => $category->name,
                          'description' => $category->description,
                          'created'     => $category->created_at,
                          'updated'     => $category->updated_at
                        ])
                      </div><!-- /.btn-group -->
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4">There are no categories yet. <a href="{{ action('CategoryController@create') }}">Create a new one!</a>.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div><!-- /.table-responsive -->
        </div>
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
</div>
@endsection
