@extends('layouts.client')
@section('title', 'User profile panel')
@section('description', 'You"r profile control panel')
@section('content')

{{-- Contingut aquí --}}
<div class="row my-0 py-0" style="margin-left:0px !important;margin-right:0px !important;">
  <div class="col-md-3 " style="padding-left:0px !important;">
      <div class="row" style="margin-left:0px !important;margin-right:0px !important;">
          <div class="card shadow-2">
            <div class="card-body">
              {{-- Errors --}}
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
            {{Form::open(['url' => "client/ProfileUsers/$user->id",'method'=>'put'])}}
                @csrf
                {{-- Nickname --}}
                <div class="form-group">
                  <label for="userName">Nikname</label>
                  <input type="text" name="nickname" value="{{ $user->nickname or old('nickname') }}" class="form-control" id="userNick" aria-describedby="nameHelp" required>
                  <small id="nameHelp" class="form-text text-muted">Nick in page.</small>
                </div>
                {{-- Name --}}
                <div class="form-group">
                  <label for="userName">Name</label>
                  <input type="text" name="name" value="{{ $user->name or old('name') }}" class="form-control" id="userName" aria-describedby="nameHelp" required>
                  <small id="nameHelp" class="form-text text-muted">Name for the future.</small>
                </div>
                {{-- Surname --}}
                <div class="form-group">
                  <label for="userName">Surname</label>
                  <input type="text" name="surname" value="{{ $user->surname or old('surname') }}" class="form-control" id="userSurname" aria-describedby="nameHelp" required>
                  <small id="nameHelp" class="form-text text-muted">Surname for the future.</small>
                </div>
                {{-- Email --}}
                <div class="form-group">
                  <label for="userEmail">E-mail</label>
                  <input type="email" name="email" value="{{ $user->email or old('email') }}" class="form-control" id="userEmail" aria-describedby="emailHelp" required>
                  <small id="emailHelp" class="form-text text-muted">Only one e-mail on the data base.</small>
                </div>
                {{-- Password --}}
                <div class="form-group">
                  <label for="userPassword">Password</label>
                  <input type="password" name="password" class="form-control" id="userPassword" aria-describedby="passwordHelp" >
                  <small id="passwordHelp" class="form-text text-muted">The password needs to have at last 6 characters.</small>
                </div>
                <div class="form-group">
                  <label for="userPasswordConf">Reenter the password</label>
                  <input type="password" name="password_confirmation" class="form-control" id="userPasswordConf" aria-describedby="passwordConfHelp" >
                  <small id="passwordConfHelp" class="form-text text-muted">Enter the same password (no errors).</small>
                </div>
                {{-- Rol --}}
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
              <br>
            </div>
          </div> <!-- /.card -->
      </div> <!-- /.row -->
  </div><!-- /.col -->
{{-- Comencem amb un row perquè la etiqueta "content" del layout té un "col" --}}

<div class="col my-2">
  <h2>Auctions</h2>
  <!-- Subhastes (navegació) -->
  <nav class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-actives-tab" data-toggle="tab"
       href="#nav-actives" role="tab" aria-controls="actives" aria-expanded="true">You'r active auctions</a>

    <a class="nav-item nav-link" id="nav-finalitzades-tab" data-toggle="tab" onclick="t();" href="#nav-finalitzades" role="tab" aria-controls="finalitzades" aria-expanded="false">You'r winning auctions</a>
  </nav>

  <!-- Subhastes (contingut) -->
  <div class="tab-content" id="nav-tabContent">
    <!-- Actives -->
    <div class="tab-pane fade active show" id="nav-actives" role="tabpanel" aria-labelledby="nav-actives-tab" aria-expanded="true">
      <div class="row pl-3 mt-3" style="margin-left:0px !important;margin-right:0px !important;">
        <div class="col">
          <div class="card-deck">
            @php
              $i=0;
            @endphp
            @forelse ($win as $auction)
              @if ($i<4)
                <div class="col-3">
                <div class="card">
                  <img class="card-img-top" src="{{ $auction->img }}" alt="{{ $auction->title }}">
                  <div class="card-body">
                    <h5 class="card-title">{{ $auction->title }}</h5>
                    <p class="card-text">{{ $auction->description }}</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Ending: {{ $auction->date_end }}</small>
                  </div>
                </div>
              </div>
            @else
              <div class="col-3 mt-4">
              <div class="card">
                <img class="card-img-top" src="{{ $auction->img }}" alt="{{ $auction->title }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $auction->title }}</h5>
                  <p class="card-text">{{ $auction->description }}</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Ending: {{ $auction->date_end }}</small>
                </div>
              </div>
            </div>
          @endif
          @php
            $i++;
          @endphp
          @empty
            <p>You don't have any active auctions at this moment. Go to <a href="{{action('AuctionClientController@index')}}">auctions.</a></p>
          @endforelse
          </div><!-- /.card-deck -->
        </div><!-- /.col -->

      </div><!-- /.tab-pane -->
      <div class="row">
            <div class="mt-4 mx-auto">
              {{ $win->links() }}
            </div><!-- /.col -->
          </div><!-- /.row -->
    </div>
    <!-- Finalitzades -->
    <div class="tab-pane fade" id="nav-finalitzades" role="tabpanel" aria-labelledby="nav-finalitzades-tab" aria-expanded="false">
      <div class="row pl-3 mt-3" style="margin-left:0px !important;margin-right:0px !important;">
        <div class="col">
          <div class="card-deck">
              @php
                $i1=0;
              @endphp
              @forelse ($win1 as $auction)
                @if ($i1<4)
                  <div class="col-3">
                  <div class="card">
                    <img class="card-img-top" src="{{ $auction->img }}" alt="{{ $auction->title }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $auction->title }}</h5>
                      <p class="card-text">{{ $auction->description }}</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Ending: {{ $auction->date_end }}</small>
                    </div>
                  </div>
                </div>
              @else
                <div class="col-3 mt-4">
                <div class="card">
                  <img class="card-img-top" src="{{ $auction->img }}" alt="{{ $auction->title }}">
                  <div class="card-body">
                    <h5 class="card-title">{{ $auction->title }}</h5>
                    <p class="card-text">{{ $auction->description }}</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Ending: {{ $auction->date_end }}</small>
                  </div>
                </div>
              </div>
            @endif
            @php
              $i1++;
            @endphp
            @empty
              <p>You don't have any won auction at this moment. Go to <a href="{{action('AuctionClientController@index')}}">auctions.</a></p>
            @endforelse
          </div><!-- /.card-deck -->
        </div><!-- /.col -->

      </div ><!-- /.tab-pane -->
      <div class="row">
            <div class="mt-4 mx-auto">
              <a href="{{route('index1')}}" class="btn btn-primary" name="button">See all you'r won auctions</a>
            </div><!-- /.col -->
          </div><!-- /.row -->
      </div>

    </div>
  </div>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container -->
<script type="text/javascript">
function load() {
  var x=document.URL;

  if (x.split("#").pop()=="nav-finalitzades") {

    var l1=document.getElementById("nav-finalitzades-tab");
    var l2=document.getElementById("nav-actives-tab");
    l1.classList.add("active");
    l1.classList.add("show");
    l1.setAttribute("aria-selected", true);
    l2.classList.remove('active');
    l2.classList.remove('show');
    l2.setAttribute("aria-selected", false);
  }
}
  function t() {
    var x=document.URL;


    if (x.split("?").pop()=="page=1" ||x.split("?").pop()=="") {

    }else {
      //var l1=document.getElementById("nav-actives-tab"); //
      //l1.classList.add("active show")
      var ruta = x.substring(0, x.lastIndexOf('?'));
      window.location.replace(ruta+'#nav-finalitzades');
    }
  }
load();


</script>
@endsection
