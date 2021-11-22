@extends('layouts.admin')

@section('content')
    <div class="row justify-content-around">
      <div class="col-md-8">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-light shadow-primary border-radius-lg pt-4 pb-3 d-flex p-4">
              <h6 class="text-capitalize w-100">Drivers</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            @if (count($drivers) > 0)
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Driver</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contact</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Origin</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Experience</th>
                      <th class="text-primary text-center text-uppercase text-xxs font-weight-bolder opacity-7">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($drivers as $driver)
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="../images/male.jpg" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{$driver->full_name}}</h6>
                              <p class="text-xs text-secondary mb-0">{{$driver->email}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$driver->phone_number}}</p>
                          <p class="text-xs text-secondary mb-0">{{$driver->address}}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0">{{$driver->state}}</p>
                          <p class="text-xs text-secondary mb-0">{{$driver->lga}}</p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{$driver->experience}}</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="" class="text-secondary font-weight-bold text-xs editDriverBtn" data-toggle="modal" data-target="#editDriverModal" data-id="{{$driver->id}}">
                            <i class="material-icons opacity-10 text-info">edit</i>
                          </a>
                          <a href="" class="text-secondary font-weight-bold text-xs deleteDriverBtn" data-toggle="modal" data-target="#deleteDriverModal" data-id="{{$driver->id}}">
                            <i class="material-icons opacity-10 text-danger">delete</i>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="text-center">No driver found!</div>
            @endif
            
          </div>
        </div>
      </div>
        
        <div class="col-md-4">
            <div class="card">
                
                <div class="card-body">
                  <h4 class="dispay-4 text-primary">Create New Driver</h4>
                  
                  {!! Form::open(['action' => 'App\Http\Controllers\DriversController@store', 'method' => 'POST', 'id' => 'newDriverForm', 'role' => 'form']) !!}
                    <div class="form-group">
                        {{Form::label('f_name', 'First Name', ['class' => 'control-label'])}}
                        {{Form::text('f_name', old('f_name'), ['class' => 'form-control border ps-2'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('l_name', 'Last Name', ['class' => 'control-label'])}}
                        {{Form::text('l_name', '', ['class' => 'form-control border ps-2'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('dob', 'Date of birth', ['class' => 'control-label'])}}
                        {{Form::date('dob', \Carbon\Carbon::now(), ['class' => 'form-control border ps-2', 'max' => \Carbon\Carbon::now()->toDateString()])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('address', 'Residential Address', ['class' => 'control-label'])}}
                        {{Form::text('address', '', ['class' => 'form-control border ps-2'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('phone', 'Phone number', ['class' => 'control-label'])}}
                        {{Form::text('phone', '', ['class' => 'form-control border ps-2'])}}
                    </div>
                    <div class="form-group">
                      <label class="control-label">State of Origin</label>
                      <select
                        onchange="toggleLGA(this);"
                        name="state"
                        id="state"
                        class="form-control border ps-2"
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
                        class="form-control border ps-2 select-lga"
                      >
                      <option value="" selected="selected">-Select state first-</option>
                      </select>
                    </div>
                    <div class="form-group">
                      {{Form::label('experience', 'Experience(Years)', ['class' => 'control-label'])}}
                      {{Form::number('experience', '', ['class' => 'form-control border ps-2'])}}
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                      {{Form::submit('Add Driver', ['class' => 'btn btn-sm btn-outline-success'])}}
                    </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

<!-- Edit Driver Modal-->
<div class="modal fade" id="editDriverModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title text-primary">Edit Driver</h4>
              <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <i class="material-icons opacity-10 text-info" style="font-size: 2.0em">&times</i>
              </a>
          </div>
          <div class="modal-body" id="editDriverModalBody">
          
          </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary" onclick="$('#editDriverForm').submit()"> Save</button>
                    </div>
                </div>
          </div>
      </div>
  </div>
</div>
<!-- Delete Driver Modal-->
<div class="modal fade" id="deleteDriverModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title text-secondary">Confirm delete driver!</h4>
              <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <i class="material-icons opacity-10 text-info" style="font-size: 2.0em">&times</i>
              </a>
          </div>
          <div class="modal-body" id="deleteDriverModalBody">
            
          </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-danger" onclick="$('#deleteDriverForm').submit()"> Yes</button>
                    </div>
                </div>
          </div>
      </div>
  </div>
</div>
@endsection
