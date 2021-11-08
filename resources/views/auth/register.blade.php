@extends('layouts.guest')

@section('content')
    <div class="page-header min-vh-100">
        <div class="container">
        <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" 
            style="background-image: url('{{ asset('images/interior-1.jpg')}}'); background-size: cover;">
            </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card card-plain" style="border: none;">
                <div class="card-header" style="background-color: transparent;">
                <h4 class="font-weight-bolder text-dark" style="text-align: center;font-size:3em;"> SIGN UP</h4>
                </div>
                <div class="card-body">
                
                        <form role="form">
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-check form-check-info text-start ps-0">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                        </div>
                        </form>

                
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1" style="border: none;">
                <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="{{ url('login')}}" class="text-primary text-gradient font-weight-bold">Sign in</a>
                </p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
