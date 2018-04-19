@extends('layouts.app')
@section('title', 'Inici')
@section('description', 'Pàgina d\'inici')
@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col">
      <h2>Auctions</h2>
      <!-- Subhastes (navegació) -->
      <nav class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-actives-tab" data-toggle="tab"
           href="#nav-actives" role="tab" aria-controls="actives" aria-expanded="true">In progress</a>
        <a class="nav-item nav-link" id="nav-finalitzades-tab" data-toggle="tab"
           href="#nav-finalitzades" role="tab" aria-controls="finalitzades" aria-expanded="false">Finished</a>
      </nav>

      <!-- Subhastes (contingut) -->
      <div class="tab-content" id="nav-tabContent">
        <!-- Actives -->
        <div class="tab-pane fade active show" id="nav-actives" role="tabpanel" aria-labelledby="nav-actives-tab" aria-expanded="true">
          <div class="row px-3 mt-3">
            <div class="col-12 col-sm-6">
              <div class="card-deck">
                @forelse ($activeAuctions as $activeAuction)
                  <div class="card">
                    <img width="100%" class="card-img-top" src="{{ $activeAuction->product->image }}" alt="{{ $activeAuction->title }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $activeAuction->title }}</h5>
                      <p class="card-text">{{ $activeAuction->description }}</p>
                      @hasanyrole('admin|auctionManager|user')
                      <a href="{{ action('AuctionClientController@show', ['id' => $activeAuction->id]) }}" class="btn btn-dark">See auction</a>
                      @endhasanyrole
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Ending: {{ $activeAuction->date_end }}</small>
                    </div>
                  </div>
                @empty
                  <p>There are no auctions yet.</p>
                @endforelse
              </div><!-- /.card-deck -->
            </div><!-- /.col -->
          </div><!-- /.tab-pane -->
        </div>
        <!-- Finalitzades -->
        <div class="tab-pane fade" id="nav-finalitzades" role="tabpanel" aria-labelledby="nav-finalitzades-tab" aria-expanded="false">
          <div class="row px-3 mt-3">
            <div class="col-12 col-sm-6">
              <div class="card-deck">
                @forelse ($finishedAuctions as $finishedAuction)
                  <div class="card">
                    <img width="100%" class="card-img-top" src="{{ $finishedAuction->getProduct($finishedAuction->stock_id)->image }}" alt="{{ $finishedAuction->title }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $finishedAuction->title }}</h5>
                      <p class="card-text">{{ $finishedAuction->description }}</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Ending: {{ $finishedAuction->date_end }}</small>
                    </div>
                  </div>
                @empty
                  <p>There are no auctions yet.</p>
                @endforelse
              </div><!-- /.card-deck -->
            </div><!-- /.col -->
          </div><!-- /.tab-pane -->
        </div>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container -->

@section('scripts')
<script type="text/javascript">

</script>
@endsection

@endsection
