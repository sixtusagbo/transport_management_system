<form role="form" method="POST" action="{{ url('/drivers/'. $driver->id) }}" id="editDriverForm">
  @csrf
  <div class="form-group mb-3">
      <label class="control-label">First Name</label>
      <input type="text" name="first_name" class="form-control border ps-2" value="{{$driver->first_name}}" required autocomplete="given-name">
  </div>
  <div class="form-group mb-3">
      <label class="form-label">Last Name</label>
      <input type="text" name="last_name" class="form-control border ps-2" value="{{$driver->last_name}}" required autocomplete="family-name">
  </div>
  <div class="form-group mt-3 mb-3">
      <label class="form-label">Date of Birth</label>
      <input type="text" style="width: 100%;border-radius:0.375rem;border:1px solid #d2d6da;padding:0.4rem 0.3rem;background-color:transparent;" name="dob" onfocus="(this.type='date');this.style.borderColor = '#e91e63';this.style.borderTopColor = 'transparent';this.style.boxShadow = 'inset 1px 0 #e91e63, inset -1px 0 #e91e63, inset 0 -1px #e91e63';" onblur="(this.type='text');" required value="{{$driver->dob}}">
  </div>
  <div class="form-group mb-3">
      <label class="form-label">Residential Address</label>
      <input type="text" name="address" class="form-control border ps-2" value="{{$driver->address}}" required autocomplete="street-address">
  </div>
  <div class="form-group mb-3">
      <label class="form-label">Phone number</label>
      <input type="text" name="phone_number" class="form-control border ps-2" value="{{$driver->phone_number}}" required autocomplete="tel">
  </div>
  <div class="form-group">
    <label class="control-label">State of Origin</label>
    <select
      onchange="toggleLGA(this);"
      name="state"
      id="state"
      class="form-control border ps-2"
    >
      <option value="{{$driver->state}}" selected>{{$driver->state}}</option>
      <option value="Abia">Abia</option>
      <option value="Adamawa">Adamawa</option>
      <option value="AkwaIbom">AkwaIbom</option>
      <option value="Anambra">Anambra</option>
      <option value="Bauchi">Bauchi</option>
      <option value="Bayelsa">Bayelsa</option>
      <option value="Benue">Benue</option>
      <option value="Borno">Borno</option>
      <option value="Cross River">Cross River</option>
      <option value="Delta">Delta</option>
      <option value="Ebonyi">Ebonyi</option>
      <option value="Edo">Edo</option>
      <option value="Ekiti">Ekiti</option>
      <option value="Enugu">Enugu</option>
      <option value="FCT">FCT</option>
      <option value="Gombe">Gombe</option>
      <option value="Imo">Imo</option>
      <option value="Jigawa">Jigawa</option>
      <option value="Kaduna">Kaduna</option>
      <option value="Kano">Kano</option>
      <option value="Katsina">Katsina</option>
      <option value="Kebbi">Kebbi</option>
      <option value="Kogi">Kogi</option>
      <option value="Kwara">Kwara</option>
      <option value="Lagos">Lagos</option>
      <option value="Nasarawa">Nasarawa</option>
      <option value="Niger">Niger</option>
      <option value="Ogun">Ogun</option>
      <option value="Ondo">Ondo</option>
      <option value="Osun">Osun</option>
      <option value="Oyo">Oyo</option>
      <option value="Plateau">Plateau</option>
      <option value="Rivers">Rivers</option>
      <option value="Sokoto">Sokoto</option>
      <option value="Taraba">Taraba</option>
      <option value="Yobe">Yobe</option>
      <option value="Zamfara">Zamafara</option>
    </select>
  </div>

  <div class="form-group">
    <label class="control-label">LGA of Origin</label>
    <select
      name="lga"
      id="lga"
      class="form-control border ps-2 select-lga"
    >
    <option value="{{$driver->lga}}" selected>{{$driver->lga}}</option>
    </select>
  </div>
  <div class="form-group mb-3">
      <label class="form-label">Experience(Years)</label>
      <input type="number" name="experience" class="form-control border ps-2" value="{{$driver->experience}}" required>
  </div>
  <input type="hidden" name="_method" value="PUT">
</form>