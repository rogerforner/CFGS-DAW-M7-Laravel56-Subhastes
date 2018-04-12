{{-- Products --}}
<div class="form-group">
  {{ Form::label('productStock', 'Products') }}
  <select name="product" class="form-control" id="productStock">
    <option value="0" selected>Select a product...</option>
    @foreach ($products as $product)
      <option value="{{ $product->id }}">{{ $product->name }}</option>
    @endforeach
  </select>
</div>

{{-- Stock --}}
<div class="form-group">
  {{ Form::label('numStock', 'Stock') }}
  {{ Form::number('numProducts', 0, ['class' => 'form-control', 'id' => 'numStock', 'min' => '0', 'required']) }}
</div>



{{-- Button --}}
{{ Form::submit($submitButton, ['class' => 'btn btn-dark']) }}
