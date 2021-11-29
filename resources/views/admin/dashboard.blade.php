@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                  <i class="fas fa-steering-wheel text-white" style="font-size:1.4em;margin-top:1.3rem;"></i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Registered Drivers </p>
                  <h4 class="mb-0">{{ $drivers->count() }}</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">electric_rickshaw</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize"> Registered Vehicles</p>
                  <h4 class="mb-0">{{ $vehicles->count() }}</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                  <i class="fas fa-map-marker-alt text-white" style="font-size:1.4em;margin-top:1.3rem;"></i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize"> Available Destinations</p>
                  <h4 class="mb-0">{{ $destinations->count() }}</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                  <i class="fas fa-ticket-alt text-white" style="font-size:1.4em;margin-top:1.3rem;"></i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Daily Tickets</p>
                  <h4 class="mb-0">{{ $dailyTickets->count() }}</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
              </div>
            </div>
          </div>
      </div>
      
      <div class="row mt-5">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                  <i class="fas fa-truck-container text-white" style="font-size:1.4em;margin-top:1.3rem;"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Daily Cargo </p>
                <h4 class="mb-0">{{ $dailyCargos->count() }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-secondary shadow-secondary text-center border-radius-xl mt-n4 position-absolute">
                <i class="fas fa-users text-white" style="font-size:1.4em;margin-top:1.3rem;"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize"> Passengers</p>
                <h4 class="mb-0">{{ $passengers->count() }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                <i class="fas fa-truck text-white" style="font-size:1.4em;margin-top:1.3rem;"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize"> Total Cargos</p>
                <h4 class="mb-0">{{ $cargos->count() }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-light shadow-light text-center border-radius-xl mt-n4 position-absolute">
                <i class="fas fa-users-cog text-dark" style="font-size:1.4em;margin-top:1.3rem;"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Administrators</p>
                <h4 class="mb-0">{{ $administrators->count() }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="accordion" id="ticketsAccordion">
          <div class="card">
            <div class="card-header p-0" id="headingOne">
              <h2 class="mb-0">
                <a class="btn btn-link" type="button" data-toggle="collapse" data-target="#tripsDIV" aria-expanded="true" aria-controls="tripsDIV">
                  <span class="text-bold text-md letter-spacing-2">Trips</span>
                </a>
              </h2>
            </div>
        
            <div class="collapse show" id="tripsDIV" aria-labelledby="headingOne" data-parent="#ticketsAccordion">
              <div class="card-body px-4 pb-2">
                <div class="bg-gradient-light shadow-light border-radius-lg pt-4 pb-3 d-flex p-4 justify-content-between">
                  <h6 class="text-capitalize w-100">Trip Bookings</h6>
                  <button class="btn btn-sm btn-primary col-sm-2" data-toggle="modal" data-target="#payTicketModal"><i class="fas fa-ticket-alt"></i> Pay for ticket</button>
                </div>
                  @if (count($tickets) > 0)
                  <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ticket No</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Passenger</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Booked On</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Destination</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Depature date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                              <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm"><i class="fas fa-drone"></i> {{$ticket->ticket_no}}</h6>
                                    </div>
                                </div>
                              </td>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                      <div class="d-flex flex-column justify-content-center">
                                          <h6 class="mb-0 text-sm">{{$ticket->user->full_name}}</h6>
                                          <p class="text-xs text-secondary mb-0">{{$ticket->user->phone_number}}</p>
                                      </div>  
                                  </div>
                                </td>
                                <td>
                                  <h6 class="mb-0 text-sm">{{$ticket->created_at->format('D jS M\, Y')}}</h6>
                                </td>
                                <td class="text-sm">
                                    <h6 class="text-sm font-weight-bold mb-0">{{$ticket->destination->name}}</h6>
                                </td>
                                <td class="text-sm">
                                    <h6 class="text-sm font-weight-bold mb-0">{{Carbon\Carbon::create($ticket->depature_date)->format('D jS M\, Y')}}</h6>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class="d-flex justify-content-center mt-2">
                        {{ $tickets->links() }}
                      </div>
                  </div>
                  @else
                      <div class="text-center">No ticket found!</div>
                  @endif
              </div>
            </div>
          </div>
          <div class="card mt-2">
            <div class="card-header p-0" id="headingOne">
              <h2 class="mb-0">
                <a class="btn btn-link" type="button" data-toggle="collapse" data-target="#cargosDIV" aria-expanded="true" aria-controls="cargosDIV">
                  <span class="text-bold text-md letter-spacing-2">Cargos</span>
                </a>
              </h2>
            </div>
        
            <div class="collapse show" id="cargosDIV" aria-labelledby="headingOne" data-parent="#ticketsAccordion">
              <div class="card-body px-4 pb-2">
                <div class="bg-gradient-light shadow-light border-radius-lg pt-4 pb-3 d-flex p-4 justify-content-between">
                  <h6 class="text-capitalize w-100">Cargo Bookings</h6>
                  <button class="btn btn-sm btn-primary col-sm-2" data-toggle="modal" data-target="#payTicketModal"><i class="fas fa-ticket-alt"></i> Pay for ticket</button>
                </div>
                  @if (count($cargo_tickets) > 0)
                  <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ticket No</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Passenger</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Booked On</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Destination</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Delivery date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cargo_tickets as $ticket)
                            <tr>
                              <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm"><i class="fas fa-drone"></i> {{$ticket->ticket_no}}</h6>
                                    </div>
                                </div>
                              </td>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                      <div class="d-flex flex-column justify-content-center">
                                          <h6 class="mb-0 text-sm">{{$ticket->user->full_name}}</h6>
                                          <p class="text-xs text-secondary mb-0">{{$ticket->user->phone_number}}</p>
                                      </div>  
                                  </div>
                                </td>
                                <td>
                                  <h6 class="mb-0 text-sm">{{$ticket->created_at->format('D jS M\, Y')}}</h6>
                                </td>
                                <td class="text-sm">
                                    <h6 class="text-sm font-weight-bold mb-0">{{$ticket->destination->name}}</h6>
                                </td>
                                <td class="text-sm">
                                    <h6 class="text-sm font-weight-bold mb-0">{{Carbon\Carbon::create($ticket->delivery_date)->format('D jS M\, Y')}}</h6>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class="d-flex justify-content-center mt-2">
                        {{ $cargo_tickets->links() }}
                      </div>
                  </div>
                  @else
                      <div class="text-center">No cargo ticket found!</div>
                  @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      
    

    <!-- Pay Ticket Modal-->
  <div class="modal fade" id="payTicketModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary">Pay for ticket</h5>
                <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons opacity-10 text-info" style="font-size: 2.0em">&times</i>
                </a>
            </div>
            <div class="modal-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::text('ticket_id', '', ['class' => 'form-control border ps-2', 'id' => 'findTicket', 'placeholder' => 'Enter ticket no to pay for a ticket']) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                      <a class="btn btn-primary loadTicket">Load Ticket</a>
                  </div>
                </div>
              </div>

                <div id="payTicket"></div>

            </div>
        </div>
    </div>
  </div>
@endsection