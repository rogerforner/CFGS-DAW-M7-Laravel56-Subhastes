@extends('layouts.admin')
@section('title', 'Products')
@section('description', 'Products')
@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="card shadow-2">
        <div class="card-body">
          <h5 class="card-title">Product's list</h5>

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
                  <th scope="col">Categories</th>
                  <th scope="col">Created at</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($products as $product)
                  <tr>
                    <td class="align-middle">{{ $product->id }}</td>
                    <td class="align-middle">{{ $product->name }}</td>
                    <td class="align-middle">{{ $product->description }}</td>
                    <td class="align-middle">{{ $categories[$product->id] }}</td>
                    <td class="align-middle">{{ $product->created_at }}</td>
                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Accions">
                        {{-- Veure --}}
                        <a class="btn btn-primary btn-sm" href="{{ action('ProductController@show', ['id' => $product->id]) }}" role="button"
                           data-toggle="tooltip" data-placement="top" title="Veure">
                          <i class="fas fa-eye"></i>
                        </a>
                        {{-- Editar --}}
                        <a class="btn btn-success btn-sm" href="{{ action('ProductController@edit', ['id' => $product->id]) }}" role="button"
                           data-toggle="tooltip" data-placement="top" title="Editar">
                          <i class="fas fa-edit"></i>
                        </a>
                        {{-- Eliminar --}}
                        <a class="btn btn-danger btn-sm rounded-right" role="button" href="" data-tooltip="tooltip" data-placement="top" title="Eliminar"
                           data-toggle="modal" data-target="#deleteUser-{{ $product->id }}">
                          <i class="fas fa-trash"></i>
                        </a>
                        @include('admin.products.partials.modal', [
                          'id'      => $product->id,
                          'name'    => $product->name,
                          'description'   => $product->description,
                          'created' => $product->created_at,
                          'updated' => $product->updated_at
                        ])
                      </div><!-- /.btn-group -->
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4">There're no products. <a href="{{ action('ProductController@create') }}">Create a new one!</a>.</td>
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