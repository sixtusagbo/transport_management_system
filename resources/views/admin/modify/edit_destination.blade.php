<form role="form" method="POST" action="{{ url('/destinations/'. $destination->id) }}" id="editDestinationForm">
  @csrf
  <div class="form-group mb-3">
      <label class="control-label">Name</label>
      <input type="text" name="name" class="form-control border ps-2" value="{{$destination->name}}" required>
  </div>
  <div class="form-group">
      {{Form::label('amount', 'Amount', ['class' => 'control-label'])}}
      {{Form::number('amount', $destination->amount, ['class' => 'form-control border ps-2', 'required', 'min' => '300', 'step' => '100'])}}
  </div>
  <input type="hidden" name="_method" value="PUT">
</form>