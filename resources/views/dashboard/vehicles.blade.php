@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/dashboard')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('drivers')}}">Drivers</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{{request()->url()}}">Vehicles</a>
                  </li>
                </ul> 
                </div>

                <div class="card-body">
                    <div class="jumbotron">{{ $vehicles }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                  <h4 class="dispay-4 text-primary">Create New vehicle</h4>
                </div>

                <div class="card-body">

                  {!! Form::open(['action' => 'App\Http\Controllers\VehiclesController@store', 'method' => 'POST', 'id' => 'newVehicleForm']) !!}
                    {{-- Vehicle names list --}}
                    <label class="control-label">Name</label>
                    <select name="name" id="make" class="form-control">
                      <option value="0">Choose name first</option>
                      <option value="Ford">Ford</option>
                      <option value="Toyota">Toyota</option>
                      <option value="Suzuki">Suzuki</option>
                      <option value="Nissan">Nissan</option>
                      <option value="Isuzu">Isuzu</option>
                    </select>
                    
                    {{-- Vehicle models List --}}
                    <label class="control-label">Model</label>
                    <select name="model" id="model" class="form-control" required>
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
                    <div class="form-group">
                        {{Form::label('plate_number', 'Plate number', ['class' => 'control-label'])}}
                        {{Form::text('plate_number', '', ['class' => 'form-control', 'required'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('seats', 'Number of Seats', ['class' => 'control-label'])}}
                        {{Form::number('seats', '', ['class' => 'form-control', 'required'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('driver_id', 'Driver', ['class' => 'control-label'])}}
                        {{Form::select('driver_id', $drivers, null, ['class' => 'form-control'])}}
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                      {{Form::submit('Add Vehicle', ['class' => 'btn btn-sm btn-outline-success'])}}
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
