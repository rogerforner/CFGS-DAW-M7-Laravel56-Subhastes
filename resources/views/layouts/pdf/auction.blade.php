<!doctype html>
<html>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <body>
    <div class="container ">
      <div class="row mt-4">
        <div class="col-3 offset-9 container rounded border border-dark pt-2">
          <h5>{{$userInfo->name.' '.$userInfo->surname}}</h5>
        </div>
      </div>
      <div class="row mt-4 pt-5" >
        <div class="col-5 offset-7 mt-5 pt-5">
          <h4>Auction title: {{$auction->title}}</h4>
          <hr>
          <h5>Product name: {{$product->name}}</h5>

          <p>Specifications of the product <br>{{$product->characteristics}}</p>
          <hr>
          <br>
        </div>
        <div class="col-6 img-thubnail mt-2 pt-2">
          <img class="mt-2 ml-0 pl-0 pt-2 rounded"src="{{$product->image}}" alt="" height="300px" width="300px">
        </div>
      </div>
      <div class="row mt-0">
        <div class="col-10">
          <p>Product description: {{$product->description}}</p>
          <br>
          <p>Auction description: {{$auction->description}}</p>
        </div>
      </div>
      </div>
  </body>
</html>
