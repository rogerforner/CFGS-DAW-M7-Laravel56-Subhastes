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
        <div class="col-12 col-md-4">
            <p class="text-center">Estat de la subhasta</p>
            <i class="mx-auto fa fa-circle"></i>
            <p class="text-center" id="countdown">12:03:46h</p>
        </div>
        <div class="col-12 col-md-4">
            <input class="form-control" type="text" name="" id="" placeholder="Quantity to bid...">
            <button class="btn btn-primary" type="submit">Bid</button>
        </div>
        <div class="col-12 col-md-4">
            <p>El teu saldo actual és:</p>
            <p>{{Auth::user()->cash}}</p>
            <a class="btn btn-info" href=""><i class="fa fa-plus"></i> Cash</a>
        </div>
    </div>
</div>
@endsection