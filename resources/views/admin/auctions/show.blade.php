@extends('layouts.admin')

@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="card shadow-2">
        <div class="card-body">
          <h5 class="card-title">Auction info</h5>
          {{-- Dades --}}
          <dl class="row">
            <dt class="col-sm-2">Name</dt>
            <dd class="col-sm-10">{{ $auction->title }}</dd>

            <dt class="col-sm-2">Description</dt>
            <dd class="col-sm-10">{{ $auction->description }}</dd>

            <dt class="col-sm-2">Product</dt>
            <dd class="col-sm-10">{{ $auction->product->name }}</dd>

            <dt class="col-sm-2">Winner</dt>
            <dd class="col-sm-10">{{ $auction->winner_id->nickname }}</dd>

            <dt class="col-sm-2">Start on</dt>
            <dd class="col-sm-10">{{ $auction->date_start }}</dd>

            <dt class="col-sm-2">Finish on</dt>
            <dd class="col-sm-10">{{ $auction->date_end }}</dd>
          </dl>
          {{-- Tornar enrere --}}
          <p class="text-right">
            <a href="{{ action('AuctionAdminController@index') }}" class="card-link">
              <i class="far fa-arrow-alt-circle-left"></i> Go back
            </a>
          </p>
        </div>
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
</div>
@endsection
