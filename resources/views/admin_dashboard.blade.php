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
      
      {{-- TODO: Add the trip bookings table with a createless crud --}}
@endsection