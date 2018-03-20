@extends('layouts.app')

@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col">
      <div class="card shadow-2">
        <div class="card-body">
          <h5 class="card-title">Llistat d'usuaris</h5>

          {{-- Warning --}}
          @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show">
              {{ session('warning') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          {{-- Success --}}
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          {{-- Taula d'usuaris --}}
          <div class="table-responsive">
            <table class="table table-hover mt-4">
              <thead class="bg-cream text-white">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Correu electrònic</th>
                  <th scope="col">Rol</th>
                  <th scope="col">Creat</th>
                  <th scope="col">Modificat</th>
                  <th scope="col">Accions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $user)
                  <tr>
                    <td class="align-middle">{{ $user->id }}</td>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    @php
                      $obtainRoleName = $user->roles()->pluck('name')->implode(' ');
                      $roleName = '';
                      if ($obtainRoleName == 'admin') {
                        $roleName = 'Administrador/ra';
                      } elseif ($obtainRoleName == 'moderator') {
                        $roleName = 'Moderador/ra';
                      } elseif ($obtainRoleName == 'pro') {
                        $roleName = 'Premium';
                      } elseif ($obtainRoleName == 'free') {
                        $roleName = 'Gratuït';
                      } else {
                        $roleName = '-';
                      }
                    @endphp
                    <td class="align-middle">{{ $roleName }}</td>
                    <td class="align-middle">{{ $user->created_at }}</td>
                    <td class="align-middle">{{ $user->updated_at }}</td>
                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Accions">
                        {{-- Veure --}}
                        <a class="btn btn-primary btn-sm" href="{{ action('UserController@show', ['id' => $user->id]) }}" role="button"
                           data-toggle="tooltip" data-placement="top" title="Veure">
                          <i class="fas fa-eye"></i>
                        </a>
                        {{-- Editar --}}
                        <a class="btn btn-primary btn-sm" href="{{ action('UserController@edit', ['id' => $user->id]) }}" role="button"
                           data-toggle="tooltip" data-placement="top" title="Editar">
                          <i class="fas fa-edit"></i>
                        </a>
                        {{-- Eliminar --}}
                        <a class="btn btn-primary btn-sm rounded-right" role="button" href="" data-tooltip="tooltip" data-placement="top" title="Eliminar"
                           data-toggle="modal" data-target="#deleteUser-{{ $user->id }}">
                          <i class="fas fa-trash"></i>
                        </a>
                        @include('admin.users.partials.modal', [
                          'id'      => $user->id,
                          'name'    => $user->name,
                          'email'   => $user->email,
                          'created' => $user->created_at,
                          'updated' => $user->updated_at
                        ])
                      </div><!-- /.btn-group -->
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4">Encara no hi ha usuaris. <a href="{{ action('UserController@create') }}">Crear usuari</a>.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div><!-- /.table-responsive -->
        </div>
      </div> <!-- /.card -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
</div>
@endsection
