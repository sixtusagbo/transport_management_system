<div class="d-flex justify-content-center mb-0">
  <div class="alert alert-info p-2 mb-0">
      <h6 class="text-bold text-light">This vehicle is currently {{$vehicle->status}}.</h6>
  </div>
</div>
<form role="form" method="POST" action="{{ url('/vehicles/'. $vehicle->id) }}" id="editVehicleForm">
  @csrf
  <div class="form-group mb-3">
      <label class="control-label">Plate number</label>
      <input type="text" name="plate_number" class="form-control border ps-2" value="{{$vehicle->plate_number}}" required>
  </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('seats', 'Number of Seats', ['class' => 'form-label'])}}
                {{Form::number('seats', $vehicle->no_of_seats, ['class' => 'form-control border ps-2', 'required', 'min' => '14', 'max' => '25'])}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('depature_time', 'Depature time', ['class' => 'form-label'])}}
                {{Form::time('depature_time', $vehicle->depature_time, ['class' => 'form-control border ps-2', 'required', 'min' => '14', 'max' => '25'])}}
            </div>
        </div>
    </div>
  <div class="form-group mb-3">
      {{Form::label('driver', 'Driver', ['class' => 'control-label'])}}
      {{Form::select('driver', $drivers, $vehicle->driver_id, ['class' => 'form-control border ps-2'])}}
  </div>
  <div class="form-group">
      {{Form::label('destination', 'Destination', ['class' => 'control-label'])}}
      {{Form::select('destination', $destinations, $vehicle->destination_id, ['class' => 'form-control border ps-2'])}}
  </div>
  <input type="hidden" name="_method" value="PUT">
</form>