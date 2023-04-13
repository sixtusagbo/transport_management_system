@extends('layouts.passenger')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-capitalize text-wrap">Cargos</h6>
                                <p class="text-sm mb-0">
                                    @if ($todayCargos->count() > 0)
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">{{ $todayCargos->count() }} booked today</span>
                                    @endif
                                </p>
                            </div>
                            <button class="btn btn-lg btn-info col-sm-2" data-toggle="modal" data-target="#bookCargoModal">
                                Send a cargo</button>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        @if (count($tickets) > 0)
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Ticket Number</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nature</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Weight</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Destination</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Status</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $ticket)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                {!! DNS1D::getBarcodeSVG("$ticket->ticket_no", 'PHARMA', 2, 60) !!}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-sm">
                                                    <h6 class="text-sm font-weight-bold mb-0">{{ $ticket->name }}</h6>
                                                </td>
                                                <td class="text-sm">
                                                    <h6 class="text-sm font-weight-bold mb-0">{{ $ticket->nature }}</h6>
                                                </td>
                                                <td class="text-sm">
                                                    <h6 class="text-sm font-weight-bold mb-0">{{ $ticket->weight }}kg</h6>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm">{{ $ticket->destination->name }}</h6>
                                                </td>
                                                <td class="text-sm">
                                                    @if ($ticket->is_paid == 1)
                                                        <span class="badge badge-sm bg-gradient-success">Paid</span>
                                                    @else
                                                        <span class="badge badge-sm bg-gradient-warning">Not Paid</span>
                                                    @endif
                                                </td>
                                                <td class="text-sm">
                                                    <a href="" class="text-info text-lg viewTicketBtn"
                                                        data-toggle="modal" data-target="#viewTicketModal"
                                                        data-id="{{ $ticket->id }}">
                                                        <i class="fas fa-eye" style="font-size: 1.3em;"
                                                            title="View Ticket"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center text-bold">No tickets booked yet!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Book a Cargo Modal-->
    <div class="modal fade" id="bookCargoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" id="bookCargoModalBody">
                    <div class="d-flex justify-content-between mb-2">
                        <h4 class="modal-title text-primary">New Cargo</h4>
                        <a class="close ps-2" type="button" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons opacity-10 text-info" style="font-size: 2.0em">&times</i>
                        </a>
                    </div>

                    {!! Form::open([
                        'action' => 'App\Http\Controllers\CargosController@store',
                        'method' => 'POST',
                        'id' => 'bookCargoForm',
                    ]) !!}
                    @csrf
                    <div class="alert alert-danger text-light" id="cargoError"></div>
                    <div class="form-group">
                        {{ Form::label('name', 'Cargo name', ['class' => 'control-label']) }}
                        {{ Form::text('name', '', ['class' => 'form-control border ps-2', 'placeholder' => 'Example: Parcel, Package', 'id' => 'cargoName']) }}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nature of cargo</label>
                                <select name="nature" id="cargoNature" class="form-control border ps-2">
                                    <option value="">-- Select --</option>
                                    <option value="Fragile">Fragile</option>
                                    <option value="Non-Fragile">Non-Fragile</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('weight', 'Weight (kg)', ['class' => 'control-label']) }}
                                {{ Form::number('weight', '', ['class' => 'form-control border ps-2', 'id' => 'cargoWeight']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        {{ Form::label('destination_id', 'Destination', ['class' => 'control-label']) }}
                        {{ Form::select('destination_id', $destinations, null, ['class' => 'form-control border ps-2', 'placeholder' => 'Select Destination', 'id' => 'cargoDestination']) }}
                    </div>
                    <div class="mb-3" id="cargoDetails"></div>
                    <div class="text-center">
                        <button type="button" class="btn bg-gradient-warning w-50 mb-0" id="bookCargoCalculate">
                            Amount?
                        </button>
                        <button type="submit" class="btn bg-gradient-info w-50 mb-0" id="bookCargoSubmit">
                            <i class="fas fa-check-circle" aria-hidden="true"></i> Book Cargo
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- View Ticket Modal-->
    <div class="modal fade" id="viewTicketModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0" id="viewTicketModalBody">
                    <div class="d-flex justify-content-between mb-2">
                        {{-- AJAX --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
