<div class="d-flex flex-column p-2" style="border-right:6px dashed blue;background-color: lightgrey;">
  <div class="mb-3 align-self-center">
    <img class="ps-2 float-left w-30" src="images/peacefooter.png" alt="">
    <span class="lead text-info">TICKET NO: <span class="font-weight-bold">{{$ticket->ticket_no}}</span></span>
  </div>
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
    <p class="font-italic text-dark text-sm text-center mb-0">Thanks for choosing PMT</p>
    <p class="lead font-italic text-dark text-sm text-bold text-center">TO GOD BE THE GLORY</p>
  </div>
</div>