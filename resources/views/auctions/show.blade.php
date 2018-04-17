@extends('layouts.app')
@section('title', 'Inici')
@section('description', 'Pàgina d\'inici')
@section('content')

<div class="container my-5">
    <div class="mb-4 row">
        <div class="col-12">
            <h3 class="text-center">{{$auction->title}}</h3>
        </div>
        <div class="col-12">
            <p class="text-center">{{$auction->description}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4">
            <img width="100%" src="{{$auction->getProduct($auction->stock_id)->image}}">
        </div>
        <div class="col-12 col-md-8">
            <p>{{$auction->getProduct($auction->stock_id)->name}}</p>
            <p>{{$auction->getProduct($auction->stock_id)->description}}</p>
            <p>{{$auction->getProduct($auction->stock_id)->characteristics}}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 col-md-4 text-center">
            <p style="margin-bottom: 0;">Auction status:<br>{{$status}}</p>
            <i style="border: 0.5px solid black;border-radius:100%;color:{{$color}};" class="mx-auto fa fa-circle"></i>
            <p style="margin-bottom: 0;margin-top: 1rem;">Auction bids: {{$total_bids}}</p>
            <p id="countdown" data-countdown="{{$auction->date_end}}"></p>
        </div>
        <div class="col-12 col-md-4 text-center">
            {{Form::open(['route' => ['auction.update',$auction->id], 'files' => true, 'method' => 'PUT'])}}
                <div style="width: 50%;" class="mx-auto form-group">
                    {{Form::label('qty', 'Quantity to bid')}}
                    {{Form::number('qty',null,['step' => 'any','class' => 'form-control','max' => Auth::user()->cash - 0.50,'min' => 0.01])}}
                </div>
                {{Form::submit('Make a bid',['class' => 'btn btn-primary'])}}
            {{Form::close()}}
        </div>
        <div class="col-12 col-md-4 text-center">
            <p>El teu saldo actual és:</p>
            <p style="margin-bottom: 1.3rem;">{{Auth::user()->cash}} €</p>
            <a class="btn btn-info" href="">Buy Cash</a>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" charset="utf-8"></script>
<script type="text/javascript">
$('[data-countdown]').each(function() {
  var $this = $(this), finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function(event) {
    var countdown_time = event.strftime('%D days %H:%M:%S')
    $this.html(countdown_time);
    if(countdown_time == "00 days 00:00:00"){
        location.reload();
    }
  });
});
</script>
@endsection

@endsection
