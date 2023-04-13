{{-- {{$ticket}} --}}
@if ($ticket->is_paid)
    <div class="alert alert-danger text-light">Ticket No <span
            class="badge badge-sm bg-gradient-dark">{{ $ticket->ticket_no }}</span> has been paid. Please enter ticket
        number of an unpaid ticket.</div>
@else
    <div class="d-flex flex-column justify-content-center">
        <div id="ticket-details">
            <table>
                <thead>
                    <tr>
                        <th class="text-center" width="34%">Ticket No</th>
                        <th class="text-center" width="34%">Seat No</th>
                        <th class="text-center" width="34%">Destination</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><small>{{ $ticket->ticket_no }}</small></td>
                        <td class="text-center"><small>{{ $ticket->seat_no }}</small></td>
                        <td class="text-center"><small>{{ $ticket->destination->name }}</small></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form role="form" method="POST" action="{{ url('/trips/' . $ticket->id) }}" id="payTicketForm">
            @csrf
            <input type="hidden" name="ticket_no" value="{{ $ticket->ticket_no }}">
            <input type="hidden" name="is_paid" value="1">
            <input type="hidden" name="_method" value="PUT">
        </form>
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-center">
                <button class="btn btn-sm btn-primary" onclick="$('#payTicketForm').submit()"> Pay
                    &#8358;{{ number_format($ticket->destination->amount, 2, '.', ',') }}</button>
            </div>
        </div>
    </div>
@endif
