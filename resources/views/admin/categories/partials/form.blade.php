{{-- Name --}}
<div class="form-group">
  {{ Form::label('catName', 'Name') }}
  {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'catName']) }}
</div>

{{-- Description --}}
<div class="form-group">
  {{ Form::label('catDesc', 'Description') }}
  {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'catDesc', 'rows' => '3']) }}
</div>

{{-- Button --}}
{{ Form::submit($submitButton, ['class' => 'btn btn-dark']) }}
