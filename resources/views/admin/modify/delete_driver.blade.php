<p class="lead display-4 font-weight-bold">
  Are you sure you wish to remove <strong class="text-info">{{$driver->full_name}}</strong>?
</p>
<form role="form" method="POST" action="{{ url('/drivers/'. $driver->id) }}" id="deleteDriverForm">
  @csrf
  <input type="hidden" name="_method" value="DELETE">
</form>