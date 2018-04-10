@extends('layouts.admin')

@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="card shadow-2">
        <div class="card-body">
          @if ($user->exists)
            <h5 class="card-title">Edit user</h5>
          @else
            <h5 class="card-title">Create user</h5>
          @endif


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

          @if ($user->exists)
            {{Form::open(['url' => "admin/users/$user->id",'method'=>'put'])}}
          @else
            {{Form::open(['url' => '/admin/users'])}}
          @endif
            {{-- Nickname --}}
            <div class="form-group">
              <label for="userName">Nikname</label>
              <input type="text" name="name" value="{{ $user->nickname or old('nickname') }}" class="form-control" id="userNick" aria-describedby="nameHelp" required>
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
              <input type="text" name="name" value="{{ $user->surname or old('surname') }}" class="form-control" id="userSurname" aria-describedby="nameHelp" required>
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
              <input type="password" name="password" class="form-control" id="userPassword" aria-describedby="passwordHelp" required>
              <small id="passwordHelp" class="form-text text-muted">The password needs to have at last 6 characters.</small>
            </div>
            <div class="form-group">
              <label for="userPasswordConf">Reenter the password</label>
              <input type="password" name="password_confirmation" class="form-control" id="userPasswordConf" aria-describedby="passwordConfHelp" required>
              <small id="passwordConfHelp" class="form-text text-muted">Enter the same password (no errors).</small>
            </div>
            {{-- Rol --}}
            <div class="form-group">
              <label for="userRole">Rol</label>
              <select name="role" class="form-control" id="userRole" aria-describedby="roleHelp">
                <option value="admin">Administrator</option>
                <option value="auctionManager">Auction Manager</option>
                <option value="user">Basic User</option>
              </select>
              <small id="roleHelp" class="form-text text-muted">Rol gives the permissions to the users.</small>
            </div>
            {{-- Crear --}}
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
          <br>
          {{-- Tornar enrere --}}
          <p class="text-right">
            <a href="{{ action('UserController@index') }}" class="card-link">
              <i class="far fa-arrow-alt-circle-left"></i> Go back
            </a>
          </p>
        </div>
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
</div>
@endsection
