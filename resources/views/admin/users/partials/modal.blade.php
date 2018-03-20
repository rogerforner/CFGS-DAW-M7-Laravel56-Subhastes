<!-- Modal -->
<div class="modal fade" id="deleteUser-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserLabel">Esborrar usuari</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tancar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- Dades usuari --}}
        <dl class="row">
          <dt class="col-sm-4">Nom</dt>
          <dd class="col-sm-8">{{ $name }}</dd>

          <dt class="col-sm-4">Correu electrònic</dt>
          <dd class="col-sm-8">{{ $email }}</dd>

          <dt class="col-sm-4">Creat el</dt>
          <dd class="col-sm-8">{{ $created }}</dd>

          <dt class="col-sm-4">Actualitzat el</dt>
          <dd class="col-sm-8">{{ $updated }}</dd>
        </dl>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tancar</button>
        <form action="{{ action('UserController@destroy', ['id' => $id]) }}" method="post">
          {{ method_field('delete') }}
          {{ csrf_field() }}
          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Esborrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
