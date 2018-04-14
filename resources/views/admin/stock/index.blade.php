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
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($products as $product)
                  <tr>
                    <td class="align-middle">{{ $product->stock->id }}</td>
                    <td class="align-middle">{{ $product->name }}</td>
                    <td class="align-middle">{{ $product->stotal == 0 ? "No stock" : "Available" }}</td>
                    <th scope="col">{{ $product->stotal }}</th>
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

@section('script')
<script type="text/javascript">

</script>
@endsection

@endsection
