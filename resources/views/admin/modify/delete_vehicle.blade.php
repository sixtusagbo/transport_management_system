<p class="lead display-4 font-weight-bold">
  Are you sure you wish to remove vehicle with plate number <strong class="text-info">{{$vehicle->plate_number}}</strong>?
</p>
<form role="form" method="POST" action="{{ url('/vehicles/'. $vehicle->id) }}" id="deleteVehicleForm">
  @csrf
  <input type="hidden" name="_method" value="DELETE">
</form>