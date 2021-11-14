<form role="form" method="POST" action="{{ url('/vehicles/'. $vehicle->id) }}" id="editVehicleForm">
  @csrf
  {{-- Vehicle names list --}}
  <label class="control-label">Name</label>
  <select name="name" id="make" class="form-control border ps-2" disabled>
    <option value="{{$vehicle->name}}" selected>{{$vehicle->name}}</option>
  </select>
  
  {{-- Vehicle models List --}}
  <label class="control-label">Model</label>
  <select name="model" id="model" class="form-control border ps-2" disabled>
    <option value="{{$vehicle->model}}" selected>{{$vehicle->model}}</option>
  </select>
  <div class="form-group mb-3">
      <label class="control-label">Plate number</label>
      <input type="text" name="plate_number" class="form-control border ps-2" value="{{$vehicle->plate_number}}" required>
  </div>
  <div class="form-group mb-3">
      <label class="control-label">Number of seats</label>
      <input type="number" name="number_of_seats" class="form-control border ps-2" value="{{$vehicle->no_of_seats}}" min="14" max="25" required>
  </div>
  <div class="form-group">
      {{Form::label('driver_id', 'Driver', ['class' => 'control-label'])}}
      {{Form::select('driver_id', $drivers, $vehicle->driver_id, ['class' => 'form-control border ps-2'])}}
  </div>
  <input type="hidden" name="_method" value="PUT">
</form>