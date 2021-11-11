@extends('layouts.admin')

@section('content')
    <div class="row justify-content-around">
        <div class="col-md-8">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-light shadow-primary border-radius-lg pt-4 pb-3 d-flex p-4">
                <h6 class="text-capitalize w-100">Users</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              @if (count($users) > 0)
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contact</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Emergency</th>
                        <th class="text-primary text-center text-uppercase text-xxs font-weight-bolder opacity-7">Option</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                @if ($user->gender == 'Male')  
                                  <img src="../images/male.jpg" class="avatar avatar-sm me-3" alt="{{$user->gender}}">
                                @else
                                  <img src="../images/female.jpg" class="avatar avatar-sm me-3" alt="{{$user->gender}}">
                                @endif
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$user->full_name}}</h6>
                                <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$user->phone_number}}</p>
                            <p class="text-xs text-secondary mb-0">{{$user->address}}</p>
                          </td>
                          <td class="align-middle text-center text-sm">
                            @if ($user->type == 1)  
                              <span class="badge badge-sm bg-gradient-success">Admin</span>
                            @else
                              <span class="badge badge-sm bg-gradient-secondary">Passenger</span>
                            @endif
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{$user->emergency}}</span>
                          </td>
                          <td class="align-middle text-center">
                            <a href="" class="text-secondary font-weight-bold text-xs editUserBtn" data-toggle="modal" data-target="#editUserModal" data-id="{{$user->id}}">
                              <i class="material-icons opacity-10 text-info">edit</i>
                            </a>
                            <a href="" class="text-secondary font-weight-bold text-xs deleteUserBtn" data-toggle="modal" data-target="#deleteUserModal" data-id="{{$user->id}}">
                              <i class="material-icons opacity-10 text-danger">delete</i>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                @else
                  <div class="text-center">No user found!</div>
                @endif
              
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                  <h4 class="dispay-4 text-primary">Create New User</h4>
                  <form role="form" method="POST" action="{{ route('add_user') }}">
                      @csrf
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">First Name</label>
                          <input type="text" name="first_name" class="form-control" required autocomplete="given-name">
                      </div>
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Last Name</label>
                          <input type="text" name="last_name" class="form-control" required autocomplete="family-name">
                      </div>
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Middle Name</label>
                          <input type="text" name="middle_name" class="form-control" required autocomplete="additional-name">
                      </div>
                      <div class="form-check form-check-inline text-start ps-0">
                          <input class="form-check-input" type="radio" name="gender" value="Male" id="Male" required>
                          <label class="form-check-label" for="Male">Male</label>
                          <input class="form-check-input" type="radio" name="gender" value="Female" id="Female" required>
                          <label class="form-check-label" for="Female">Female</label>
                      </div>
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Phone number</label>
                          <input type="text" name="phone_number" class="form-control" required autocomplete="tel">
                      </div>
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" required autocomplete="email">
                      </div>
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" required autocomplete="new-password">
                      </div>
                      <div class="input-group input-group-outline">
                          <label class="form-label">Confirm Password</label>
                          <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                      </div>
                      <small class="form-text" style="color:#e91e63;">
                          Your password must be 6 characters long.
                      </small>
                      <div class="form-check form-check-inline text-start ps-0">
                          <input class="form-check-input" type="radio" name="type" value="1" id="1">
                          <label class="form-check-label" for="1">Admin</label>
                          <input class="form-check-input" type="radio" name="type" value="0" id="0" checked>
                          <label class="form-check-label" for="0">Passenger</label>
                      </div>
                      <div class="input-group input-group-outline mt-3 mb-3">
                          <label class="form-label">Date of Birth</label>
                          <input type="text" style="width: 100%;border-radius:0.375rem;border:1px solid #d2d6da;padding:0.4rem 0.3rem;background-color:transparent;" name="dob" onfocus="(this.type='date');this.style.borderColor = '#e91e63';this.style.borderTopColor = 'transparent';this.style.boxShadow = 'inset 1px 0 #e91e63, inset -1px 0 #e91e63, inset 0 -1px #e91e63';" onblur="(this.type='text');" required>
                      </div>
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Emergency contact</label>
                          <input type="text" name="emergency" class="form-control" required autocomplete="tel">
                      </div>
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Residential Address</label>
                          <input type="text" name="address" class="form-control" required autocomplete="street-address">
                      </div>
                      <div class="form-check form-check-info text-start ps-0">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                          <label class="form-check-label" for="flexCheckDefault">
                          I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                          </label>
                      </div>
                      <div class="text-center">
                          <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    
<!-- Edit User Modal-->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title text-primary">Edit User</h4>
              <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <i class="material-icons opacity-10 text-info" style="font-size: 2.0em">&times</i>
              </a>
          </div>
          <div class="modal-body" id="editUserModalBody">
          
          </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary" onclick="$('#editUserForm').submit()"> Save</button>
                    </div>
                </div>
          </div>
      </div>
  </div>
</div>
<!-- Delete User Modal-->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title text-secondary">Confirm delete user!</h4>
              <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <i class="material-icons opacity-10 text-info" style="font-size: 2.0em">&times</i>
              </a>
          </div>
          <div class="modal-body" id="deleteUserModalBody">
            
          </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-danger" onclick="$('#deleteUserForm').submit()"> Yes</button>
                    </div>
                </div>
          </div>
      </div>
  </div>
</div>
@endsection
