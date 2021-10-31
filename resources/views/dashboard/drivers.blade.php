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
                        <a class="nav-link active" href="{{request()->url()}}">Drivers</a>
                    </li>
                </ul> 
                </div>

                <div class="card-body">
                    <div class="jumbotron">{{ $drivers }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                  <h4 class="dispay-4 text-primary">Create New Driver</h4>
                </div>

                <div class="card-body">

                  {!! Form::open(['action' => 'App\Http\Controllers\DriversController@store', 'method' => 'POST', 'id' => 'newDriverForm']) !!}
                    <div class="form-group">
                        {{Form::label('f_name', 'First Name', ['class' => 'control-label'])}}
                        {{Form::text('f_name', old('f_name'), ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('l_name', 'Last Name', ['class' => 'control-label'])}}
                        {{Form::text('l_name', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('dob', 'Date of birth', ['class' => 'control-label'])}}
                        {{Form::date('dob', \Carbon\Carbon::now())}}
                    </div>
                    <div class="form-group">
                        {{Form::label('address', 'Home Address', ['class' => 'control-label'])}}
                        {{Form::text('address', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('phone', 'Phone number', ['class' => 'control-label'])}}
                        {{Form::text('phone', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                      <label class="control-label">State of Origin</label>
                      <select
                        onchange="toggleLGA(this);"
                        name="state"
                        id="state"
                        class="form-control"
                      >
                        <option value="" selected="selected">- Select -</option>
                        <option value="Abia">Abia</option>
                        <option value="Adamawa">Adamawa</option>
                        <option value="AkwaIbom">AkwaIbom</option>
                        <option value="Anambra">Anambra</option>
                        <option value="Bauchi">Bauchi</option>
                        <option value="Bayelsa">Bayelsa</option>
                        <option value="Benue">Benue</option>
                        <option value="Borno">Borno</option>
                        <option value="Cross River">Cross River</option>
                        <option value="Delta">Delta</option>
                        <option value="Ebonyi">Ebonyi</option>
                        <option value="Edo">Edo</option>
                        <option value="Ekiti">Ekiti</option>
                        <option value="Enugu">Enugu</option>
                        <option value="FCT">FCT</option>
                        <option value="Gombe">Gombe</option>
                        <option value="Imo">Imo</option>
                        <option value="Jigawa">Jigawa</option>
                        <option value="Kaduna">Kaduna</option>
                        <option value="Kano">Kano</option>
                        <option value="Katsina">Katsina</option>
                        <option value="Kebbi">Kebbi</option>
                        <option value="Kogi">Kogi</option>
                        <option value="Kwara">Kwara</option>
                        <option value="Lagos">Lagos</option>
                        <option value="Nasarawa">Nasarawa</option>
                        <option value="Niger">Niger</option>
                        <option value="Ogun">Ogun</option>
                        <option value="Ondo">Ondo</option>
                        <option value="Osun">Osun</option>
                        <option value="Oyo">Oyo</option>
                        <option value="Plateau">Plateau</option>
                        <option value="Rivers">Rivers</option>
                        <option value="Sokoto">Sokoto</option>
                        <option value="Taraba">Taraba</option>
                        <option value="Yobe">Yobe</option>
                        <option value="Zamfara">Zamafara</option>
                      </select>
                    </div>
      
                    <div class="form-group">
                      <label class="control-label">LGA of Origin</label>
                      <select
                        name="lga"
                        id="lga"
                        class="form-control select-lga"
                        {{-- required --}}
                      >
                      <option value="" selected="selected">-Select state first-</option>
                      </select>
                    </div>
                    <div class="form-group">
                      {{Form::label('experience', 'Experience', ['class' => 'control-label'])}}
                      {{Form::textarea('experience', '', ['class' => 'form-control', 'rows' => '3','cols' => '30'])}}
                    </div>
                    <div class="d-flex justify-content-end">
                      {{Form::submit('Add Driver', ['class' => 'btn btn-sm btn-outline-success'])}}
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
