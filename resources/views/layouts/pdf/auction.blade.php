<!doctype html>
<html>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <body>
    <div class="container">
      <div class="col">
        <div class="row">
          <h4>{{$auction->title}}</h4>
        </div>
        <div class="row">
          <h5>{{$product->name}}</h5>
        </div>
        <img src="{{$product->image}}" alt="">
        <div class="row">
          {{$product->characteristics}}
        </div>
        <div class="row">
          <p>{{$product->description}}</p>
        </div>
        <div class="row">
          <p>{{$auction->description}}</p>
        </div>
        <div class="row">
          <h5>{{$userInfo->name.' '.$userInfo->surname}}</h5>
        </div>
      </div>
    </div>
  </body>
</html>
