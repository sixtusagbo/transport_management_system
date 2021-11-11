<form role="form" method="POST" action="{{ url('/users/'. $user->id) }}" id="editUserForm">
    @csrf
    <div class="form-group mb-3">
        <label class="control-label">First Name</label>
        <input type="text" name="first_name" class="form-control border ps-2" value="{{$user->first_name}}" required autocomplete="given-name">
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control border ps-2" value="{{$user->last_name}}" required autocomplete="family-name">
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Middle Name</label>
        <input type="text" name="middle_name" class="form-control border ps-2" value="{{$user->middle_name}}" required autocomplete="additional-name">
    </div>
    <div class="form-check form-check-inline text-start ps-0">
        <input class="form-check-input" type="radio" name="gender" value="Male" id="Male" required
        @if ($user->gender == 'Male')
            checked
        @endif
        >
        <label class="form-check-label" for="Male">Male</label>
        <input class="form-check-input" type="radio" name="gender" value="Female" id="Female" required
        @if ($user->gender == 'Female')
            checked
        @endif
        >
        <label class="form-check-label" for="Female">Female</label>
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Phone number</label>
        <input type="text" name="phone_number" class="form-control border ps-2" value="{{$user->phone_number}}" required autocomplete="tel">
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control border ps-2" value="{{$user->email}}" required autocomplete="email">
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control border ps-2" required autocomplete="new-password">
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control border ps-2" required autocomplete="new-password">
    </div>
    <small class="form-text" style="color:#e91e63;">
        Your password must be 6 characters long.
    </small>
    <br>
    <div class="form-check form-check-inline text-start ps-0">
        <input class="form-check-input" type="radio" name="type" value="1" id="1"
        @if ($user->type == 1)
            checked
        @endif
        >
        <label class="form-check-label" for="1">Admin</label>
        <input class="form-check-input" type="radio" name="type" value="0" id="0"
        @if ($user->type == 0)
            checked
        @endif
        >
        <label class="form-check-label" for="0">Passenger</label>
    </div>
    <div class="form-group mt-3 mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="text" style="width: 100%;border-radius:0.375rem;border:1px solid #d2d6da;padding:0.4rem 0.3rem;background-color:transparent;" name="dob" onfocus="(this.type='date');this.style.borderColor = '#e91e63';this.style.borderTopColor = 'transparent';this.style.boxShadow = 'inset 1px 0 #e91e63, inset -1px 0 #e91e63, inset 0 -1px #e91e63';" onblur="(this.type='text');" required value="{{$user->dob}}"  max="{{\Carbon\Carbon::now()->toDateString()}}">
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Emergency contact</label>
        <input type="text" name="emergency" class="form-control border ps-2" value="{{$user->emergency}}" required autocomplete="tel">
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Residential Address</label>
        <input type="text" name="address" class="form-control border ps-2" value="{{$user->address}}" required autocomplete="street-address">
    </div>
    <input type="hidden" name="_method" value="PUT">
</form>