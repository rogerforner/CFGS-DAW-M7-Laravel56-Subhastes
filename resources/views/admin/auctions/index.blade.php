@extends('layouts.admin')
@section('title', 'auctions')
@section('description', 'auctions')
@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="card shadow-2">
        <div class="card-body">
          <h5 class="card-title">Auction's list</h5>

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
                  <th scope="col">Title</th>
                  <th scope="col">Product</th>
                  <th scope="col">Date Start</th>
                  <th scope="col">Date End</th>
                  <th scope="col">ID Winner(?)</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($auctions as $auction)
                  <tr>
                    <td class="align-middle">{{ $auction->id }}</td>
                    <td class="align-middle">{{ $auction->title }}</td>
                    <td class="align-middle">{{ $auction->stock_id }}</td>
                    <td class="align-middle">{{ $auction->date_start}}</td>
                    <td class="align-middle">{{ $auction->date_end }}</td>
                    <td class="align-middle">
                      @if($auction->winner_id == NULL)
                        <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="There's no winner yet.."></i>
                      @else
                        {{$auction->winner_id[0]->nickname}}
                      @endif
                    </td>
                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Accions">
                        {{-- Veure --}}
                        <a class="btn btn-primary btn-sm" href="{{ action('AuctionAdminController@show', ['id' => $auction->id]) }}" role="button"
                           data-toggle="tooltip" data-placement="top" title="Show">
                          <i class="fas fa-eye"></i>
                        </a>
                        {{-- Editar --}}
                        <a class="btn btn-success btn-sm" href="{{ action('AuctionAdminController@edit', ['id' => $auction->id]) }}" role="button"
                           data-toggle="tooltip" data-placement="top" title="Edit">
                          <i class="fas fa-edit"></i>
                        </a>
                        {{-- Eliminar --}}
                        <a class="btn btn-danger btn-sm rounded-right" role="button" href="" data-tooltip="tooltip" data-placement="top" title="Delete"
                           data-toggle="modal" data-target="#deleteUser-{{ $auction->id }}">
                          <i class="fas fa-trash"></i>
                        </a>
                        @include('admin.auctions.partials.modal', [
                          'id'      => $auction->id,
                          'name'    => $auction->title,
                          'description'   => $auction->description,
                          'created' => $auction->created_at,
                          'updated' => $auction->updated_at
                        ])
                      </div><!-- /.btn-group -->
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4">There're no auctions. <a href="{{ action('AuctionAdminController@create') }}">Create a new one!</a>.</td>
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