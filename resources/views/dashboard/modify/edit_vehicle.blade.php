<form role="form" method="POST" action="{{ url('/vehicles/'. $vehicle->id) }}" id="editVehicleForm">
  @csrf
  {{-- Vehicle names list --}}
  <label class="control-label">Name</label>
  <select name="name" id="make" class="form-control border ps-2">
    <option value="{{$vehicle->name}}" selected>{{$vehicle->name}}</option>
    <option value="Ford">Ford</option>
    <option value="Toyota">Toyota</option>
    <option value="Suzuki">Suzuki</option>
    <option value="Nissan">Nissan</option>
    <option value="Isuzu">Isuzu</option>
  </select>
  
  {{-- Vehicle models List --}}
  <label class="control-label">Model</label>
  <select name="model" id="model" class="form-control border ps-2" required>
    <option value="{{$vehicle->model}}" selected>{{$vehicle->model}}</option>
    <option value="Courier" data-make="Ford">Courier</option>
    <option value="Falcon" data-make="Ford">Falcon</option>
    <option value="Festiva" data-make="Ford">Festiva</option>
    <option value="Fiesta" data-make="Ford">Fiesta</option>
    <option value="Focus" data-make="Ford">Focus</option>
    <option value="Laser" data-make="Ford">Laser</option>
    <option value="Hiace" data-make="Toyota">Hiace</option>
    <option value="Corolla" data-make="Toyota">Corolla</option>
    <option value="Avalon" data-make="Toyota">Avalon</option>
    <option value="RAV4" data-make="Toyota">RAV4</option>
    <option value="Forenza" data-make="Suzuki">Forenza</option>
    <option value="Every" data-make="Suzuki">Every</option>
    <option value="Reno" data-make="Suzuki">Reno</option>
    <option value="Vitara" data-make="Suzuki">Vitara</option>
    <option value="Verona" data-make="Suzuki">Verona</option>
    <option value="Urvan" data-make="Nissan">Urvan</option>
    <option value="Vanatte" data-make="Nissan">Vanatte</option>
    <option value="Caravan" data-make="Nissan">Caravan</option>
    <option value="Oasis" data-make="Isuzu">Oasis</option>
    <option value="i-280" data-make="Isuzu">i-280</option>
    <option value="Elf" data-make="Isuzu">Elf</option>
    <option value="Rodeo" data-make="Isuzu">Rodeo</option>
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