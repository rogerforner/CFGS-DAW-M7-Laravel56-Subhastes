{{-- Stock --}}
<div class="form-group">
  {{ Form::label('numStock', 'Stock') }}
  {{ Form::number('stock', 0, ['class' => 'form-control', 'id' => 'numStock', 'min' => '0', 'required']) }}
</div>

{{-- Button --}}
{{ Form::submit($submitButton, ['class' => 'btn btn-dark']) }}
