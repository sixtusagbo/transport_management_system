<div class="d-flex flex-column p-2" style="border-left:6px dashed blue;background-color: lightgrey;">
  <div class="mb-3 align-self-center">
    <img class="ps-2 float-left w-30" src="{{ asset('images/peacefooter.png')}}" alt="">
    <span class="lead text-info">TICKET NO: <span class="font-weight-bold">{{$ticket->ticket_no}}</span></span>
  </div>
  @if (request()->routeIs('show_trip'))
  <div class="mb-2">
    <span class="text-dark text-bold text-lg">Name: </span><span class="border-bottom border-dark text-dark text-monospace" style="font-size: 1.5em">{{$ticket->user->full_name}}</span>
  </div>
  <div class="mb-2">
    <span class="text-dark text-bold text-lg">Address: </span><span class="border-bottom border-dark text-dark" style="font-size: 1.5em">{{$ticket->user->address}}</span>
  </div>
  <div class="mb-2">
    <span class="text-dark text-bold text-lg">Destination: </span><span class="border-bottom border-dark text-dark" style="font-size: 1.5em">{{$ticket->destination->name}}</span>
  </div>
  <div class="mb-2">
    <span class="text-dark text-bold text-lg">Depature: </span><span class="border-bottom border-dark text-dark" style="font-size: 1.5em">{{$ticket->depature}}</span>
  </div>
  <div class="mb-4">
    <span class="text-dark text-bold text-lg">Charge: </span><span class="border-bottom border-dark text-dark" style="font-size: 1.5em">&#8358;{{$ticket->destination->amount}}</span>
  </div>
  <div class="align-self-center">
    <p class="lead font-italic text-dark text-sm text-bold mb-0">Luggage are at owner's risk. No refund of money after payment</p>
  @endif
  
  @if (request()->routeIs('show_cargo'))
  <div class="mb-2">
    <span class="text-dark text-bold text-lg">Name: </span><span class="border-bottom border-dark text-dark text-monospace" style="font-size: 1.5em">{{$ticket->name}}</span>
  </div>
  <div class="mb-2">
    <span class="text-dark text-bold text-lg">Nature: </span><span class="border-bottom border-dark text-dark text-monospace" style="font-size: 1.5em">{{$ticket->nature}}</span>
  </div>
  <div class="mb-2">
    <span class="text-dark text-bold text-lg">Weight: </span><span class="border-bottom border-dark text-dark text-monospace" style="font-size: 1.5em">{{$ticket->weight}}kg</span>
  </div>
  <div class="mb-2">
    <span class="text-dark text-bold text-lg">Destination: </span><span class="border-bottom border-dark text-dark" style="font-size: 1.5em">{{$ticket->destination->name}}</span>
  </div>
  <div class="mb-2">
    <span class="text-dark text-bold text-lg">Delivery: </span><span class="border-bottom border-dark text-dark" style="font-size: 1.5em">{{$ticket->delivery_date}}</span>
  </div>
  <div class="mb-4">
    <span class="text-dark text-bold text-lg">Charge: </span><span class="border-bottom border-dark text-dark" style="font-size: 1.5em">&#8358;{{$ticket->amount}}</span>
  </div>
  <div class="align-self-center">
  @endif
    <p class="font-italic text-dark text-sm text-center mb-0">Thanks for choosing PMT</p>
    <p class="lead font-italic text-dark text-sm text-bold text-center">TO GOD BE THE GLORY</p>
  </div>
  <div class="align-self-end">
    @if (request()->routeIs('show_trip'))
      <a href="/print_trip/{{$ticket->id}}" target="_blank" class="btn btn-success btn-fill pull-right">PRINT</a>
    @endif

    @if (request()->routeIs('show_cargo'))
      <a href="/print_cargo/{{$ticket->id}}" target="_blank" class="btn btn-success btn-fill pull-right">PRINT</a>
    @endif
  </div>
</div>