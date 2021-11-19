@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-around">
      <div class="col-md-8">
          <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-light shadow-primary border-radius-lg pt-4 pb-3 d-flex p-4">
                    <h6 class="text-capitalize w-100">Available Destinations</h6>
                  </div>
              </div>
              <div class="card-body px-0 pb-2">
                  @if (count($destinations) > 0)
                  <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                      <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Vehicle</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                            <th class="text-primary text-center text-uppercase text-xxs font-weight-bolder opacity-7">Option</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($destinations as $destination)
                          <tr>
                              <td>
                                  <div class="d-flex px-2 py-1">
                                      <div class="d-flex flex-column justify-content-center">
                                          <h6 class="mb-0 text-sm"><i class="fas fa-location-arrow"></i> {{$destination->name}}</h6>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0">
                                @if ($destination->vehicles->count() > 1)
                                    @foreach ($destination->vehicles as $vehicle)
                                        @if ($vehicle == $destination->vehicles->last())
                                            {{$vehicle->plate_number.'.'}}
                                        @else                                        
                                            {{$vehicle->plate_number.', '}}
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($destination->vehicles as $vehicle)
                                        {{$vehicle->plate_number}}
                                    @endforeach
                                @endif
                                @if ($destination->vehicles->count() == 0)
                                    {!! 'None' !!}
                                @endif
                                </p>
                              </td>
                              <td class="align-middle text-center text-sm">
                                  <p class="text-xs font-weight-bold mb-0">&#8358;{{number_format($destination->amount, '2', '.', ',')}}</p>
                              </td>
                              <td class="align-middle text-center">
                                <a href="" class="text-secondary font-weight-bold text-xs editDestinationBtn" data-toggle="modal" data-target="#editDestinationModal" data-id="{{$destination->id}}">
                                    <i class="material-icons opacity-10 text-info">edit</i>
                                </a>
                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="modal" data-target="#deleteDestinationModal">
                                    <i class="material-icons opacity-10 text-danger">delete</i>
                                  </a>
                            </td>
                          </tr>
                          <form role="form" method="POST" action="{{ url('/destinations/'. $destination->id) }}" id="deleteDestinationForm">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                          @endforeach
                      </tbody>
                      </table>
                  </div>
                  @else
                      <div class="text-center">No destination found!</div>
                  @endif
                  
              </div>
            </div>
          </div>
          
      <div class="col-md-4">
          <div class="card">
            
            <div class="card-body">
                  <h4 class="dispay-4 text-primary">Create New Destination</h4>

                {!! Form::open(['action' => 'App\Http\Controllers\DestinationsController@store', 'method' => 'POST', 'id' => 'newDestinationForm']) !!}
                  <div class="form-group">
                      {{Form::label('name', 'Name', ['class' => 'control-label'])}}
                      {{Form::text('name', '', ['class' => 'form-control border ps-2', 'required'])}}
                  </div>
                  <div class="form-group">
                      {{Form::label('amount', 'Amount', ['class' => 'control-label'])}}
                      {{Form::number('amount', '', ['class' => 'form-control border ps-2', 'required', 'min' => '300', 'step' => '100'])}}
                  </div>
                  <div class="d-flex justify-content-end mt-3">
                    {{Form::submit('Add Destination', ['class' => 'btn btn-sm btn-outline-success'])}}
                  </div>
              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
</div>
</div>
<!-- Edit Destination Modal-->
<div class="modal fade" id="editDestinationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary">Edit Destination</h4>
                <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons opacity-10 text-info" style="font-size: 2.0em">&times</i>
                </a>
            </div>
            <div class="modal-body" id="editDestinationModalBody">
            {{-- AJAX js --}}
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                            <button class="btn btn-sm btn-primary" onclick="$('#editDestinationForm').submit()"> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Destination Modal-->
<div class="modal fade" id="deleteDestinationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary">Delete Destination</h4>
                <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons opacity-10 text-info" style="font-size: 2.0em">&times</i>
                </a>
            </div>
            <div class="modal-body" id="deleteDestinationModalBody">
                <p class="lead display-4 font-weight-bold">
                    Are you sure you wish to remove this destination?
                </p>
            </div>
            <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-primary" onclick="$('#deleteDestinationForm').submit()"> Save</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection