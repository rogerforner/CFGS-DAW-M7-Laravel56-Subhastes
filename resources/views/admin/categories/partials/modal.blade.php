<!-- Modal -->
<div class="modal fade" id="deleteCategory-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCategoryLabel">Delete category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- Body --}}
      <div class="modal-body">
        <dl class="row">
          <dt class="col-sm-4">Name</dt>
          <dd class="col-sm-8">{{ $name }}</dd>

          <dt class="col-sm-4">Description</dt>
          <dd class="col-sm-8">{{ $description }}</dd>

          <dt class="col-sm-4">Created at</dt>
          <dd class="col-sm-8">{{ $created }}</dd>

          <dt class="col-sm-4">Updated at</dt>
          <dd class="col-sm-8">{{ $updated }}</dd>
        </dl>
      </div>
      {{-- Footer --}}
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        {{-- Formulari --}}
        {{ Form::open(['action' => ['CategoryAdminController@destroy', $id], 'method' => 'delete']) }}
          {{ Form::button('<i class="fas fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger']) }}
        {{ Form::close() }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
