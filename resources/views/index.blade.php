@extends('layouts.client')
@section('title', 'Inici')
@section('description', 'Pàgina d\'inici')
@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col">
      <h2>Subhastes</h2>
      <!-- Subhastes (navegació) -->
      <nav class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-actives-tab" data-toggle="tab"
           href="#nav-actives" role="tab" aria-controls="actives" aria-expanded="true">Actives</a>
        <a class="nav-item nav-link" id="nav-finalitzades-tab" data-toggle="tab"
           href="#nav-finalitzades" role="tab" aria-controls="finalitzades" aria-expanded="false">Finalitzades</a>
      </nav>

      <!-- Subhastes (contingut) -->
      <div class="tab-content" id="nav-tabContent">
        <!-- Actives -->
        <div class="tab-pane fade active show" id="nav-actives" role="tabpanel" aria-labelledby="nav-actives-tab" aria-expanded="true">
          <p>Actives</p>
        </div>
        <!-- Finalitzades -->
        <div class="tab-pane fade" id="nav-finalitzades" role="tabpanel" aria-labelledby="nav-finalitzades-tab" aria-expanded="false">
          <p>Finalitzades</p>
        </div>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container -->

@endsection
