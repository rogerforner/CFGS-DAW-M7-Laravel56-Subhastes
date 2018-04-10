@extends('layouts.client')
@section('title', 'User profile panel')
@section('description', 'You"r profile control panel')
@section('content')

{{-- Contingut aquí --}}
<div class="row my-3">
  <div class="col">
    <div class="container rounded-top border border-dark">
      <div class="row">
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
    </div><!-- /.card -->
  </div><!-- /.col -->
{{-- Comencem amb un row perquè la etiqueta "content" del layout té un "col" --}}
<div class="row my-3">
  <div class="col-md-6">
    <div class="card">
      <h5 class="card-header">You'r active auctions</h5>
      @forelse ($win as $auction)
        <div class="card-body">
          <h5 class="card-title">{{$auction->title}}</h5>
          <p class="card-text">{{$auction->description}}</p>
          <a href="#" class="btn btn-primary">Un enllaç</a>
        </div>
      @empty
        <p>You don't have any live auction at this moment. Go to <a href="#">auctions</a></p>
      @endforelse

    </div><!-- /.card -->
  </div><!-- /.col -->
  <div class="col-md-6">
    <div class="card">
      <h5 class="card-header">You'r winning auctions</h5>
      <div class="card-body">
        <h5 class="card-title">Tirant lo Blanc</h5>
        <p class="card-text">Ciutats no es porien sostenir en pau segons. En l'exercici militar perquè en les batalles fossen forts. Les armes de cascú com era ajustat se. De cavalleria lo comte Guillem de Varoic en els seus. Recita aquell gran orador Tul·li Llegim en. De les penses humanes Mereixedors. Llibres són estats fets e compilats de. No es porien sostenir en pau segons que diu. Obtesa victòria gloriosa E trobant-se lo virtuós Comte. Sant Antoni e de Sant. Com era ajustat se mostraven totes. De molta poca edat E havia fet fer. Parts principals per demostrar l'honor. Franc arbitre que si aquell és ben regit les.</p>
        <a href="#" class="btn btn-primary">Un enllaç</a>
      </div>
    </div><!-- /.card -->
  </div><!-- /.col -->
</div><!-- /.row -->



@endsection
