@extends('layouts.passenger')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-capitalize text-wrap">Trips</h6>
                                <p class="text-sm mb-0">
                                    @if ($todayTickets->count() > 0)
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">{{ $todayTickets->count() }} booked today</span>
                                    @endif
                                </p>
                            </div>
                            <button class="btn btn-lg btn-info col-sm-2" data-toggle="modal" data-target="#bookTripModal"><i
                                    class="fas fa-ticket-alt"></i> Book a trip</button>
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
                                                Booked On</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Destination</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Depature</th>
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
                                                <td>
                                                    <h6 class="mb-0 text-sm">{{ $ticket->created_at->format('jS M\, Y') }}
                                                    </h6>
                                                </td>
                                                <td class="text-sm">
                                                    <h6 class="text-sm font-weight-bold mb-0">
                                                        {{ $ticket->destination->name }}</h6>
                                                </td>
                                                <td class="text-sm">
                                                    <h6 class="text-sm font-weight-bold mb-0">{{ $ticket->depature }}</h6>
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

    <!-- Book a Trip Modal-->
    <div class="modal fade" id="bookTripModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" id="bookTripModalBody">
                    <div class="d-flex justify-content-between mb-2">
                        <h4 class="modal-title text-primary">New Trip</h4>
                        <a class="close ps-2" type="button" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons opacity-10 text-info" style="font-size: 2.0em">&times</i>
                        </a>
                    </div>

                    {!! Form::open([
                        'action' => 'App\Http\Controllers\TripsController@store',
                        'method' => 'POST',
                        'id' => 'bookTicketForm',
                    ]) !!}
                    @csrf
                    <div class="form-group">
                        {{ Form::label('depature_date', 'Depature date', ['class' => 'control-label']) }}
                        {{ Form::date('depature_date', \Carbon\Carbon::now(), ['class' => 'form-control border ps-2','max' => \Carbon\Carbon::now()->addDays(5)->toDateString(),'min' => \Carbon\Carbon::now()->toDateString()]) }}
                    </div>
                    <div class="form-group mb-3">
                        {{ Form::label('destination_id', 'Destination', ['class' => 'control-label']) }}
                        {{ Form::select('destination_id', $destinations, null, ['class' => 'form-control border ps-2', 'placeholder' => 'Select Destination', 'id' => 'loadDestination']) }}
                    </div>
                    <div class="mb-3" id="destinationDetails"></div>

                    <div class="text-center" id="bookTicketSubmit">
                        <button type="submit" class="btn bg-gradient-info w-50 mb-0">
                            <i class="fas fa-check-circle" aria-hidden="true"></i> Book
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
