@extends('layouts.admin')
@section('title', 'Stock.')
@section('description', 'All the stock.')
@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Stock</h5>

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
                  <th scope="col">Product</th>
                  <th scope="col">Available</th>
                  <th scope="col">Reference</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($stocks as $stock)
                  <tr>
                    <td class="align-middle">{{ $stock->id }}</td>
                    <td class="align-middle">{{ $stock->product->name }}</td>
                    <td class="align-middle">{{ $stock->available }}</td>
                    <td class="align-middle">{{ $stock->reference }}</td>
                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Accions">
                        {{-- Veure --}}
                        <a class="btn btn-dark btn-sm" href="{{ action('StockController@show', ['id' => $stock->id]) }}" role="button"
                           data-toggle="tooltip" data-placement="top" title="See">
                          <i class="fas fa-eye"></i>
                        </a>
                        {{-- Editar --}}
                        <a class="btn btn-dark btn-sm" href="{{ action('StockController@edit', ['id' => $stock->id]) }}" role="button"
                           data-toggle="tooltip" data-placement="top" title="Edit">
                          <i class="fas fa-edit"></i>
                        </a>
                        {{-- Eliminar --}}
                        <a class="btn btn-dark btn-sm rounded-right" role="button" href="" data-tooltip="tooltip" data-placement="top" title="Delete"
                           data-toggle="modal" data-target="#deleteStock-{{ $stock->id }}">
                          <i class="fas fa-trash"></i>
                        </a>
                        @include('admin.stock.partials.modal', [
                          'id'          => $stock->id,
                          'name'        => $stock->product->name,
                          'description' => $stock->reference,
                          'created'     => $stock->created_at,
                          'updated'     => $stock->updated_at
                        ])
                      </div><!-- /.btn-group -->
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5">There are no stock yet. <a href="{{ action('StockController@create') }}">Create a new one!</a>.</td>
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
