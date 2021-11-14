<p class="lead display-4 font-weight-bold">
  Are you sure you wish to remove <strong class="text-info">{{$user->full_name}}</strong>?
</p>
<form role="form" method="POST" action="{{ url('/users/'. $user->id) }}" id="deleteUserForm">
  @csrf
  <input type="hidden" name="_method" value="DELETE">
</form>