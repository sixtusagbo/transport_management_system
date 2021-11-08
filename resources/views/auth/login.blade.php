@extends('layouts.guest')

@section('content')
    <div class="page-header align-items-start min-vh-100" style="background-image: url('{{ asset('images/peace-park.jpg')}}');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                        <div class="row mt-3"> </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="text-start">
                        @csrf
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Phone number</label>
                            <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required autocomplete="phone_number" autofocus>
                            
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check form-switch d-flex align-items-center mb-3">
                            <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                            <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                        </div>
                        {{-- @if (Route::has('password.request'))
                            <p class="mt-4 text-sm text-center">
                                Forgot Your Password?
                                <a href="{{ route('password.request') }}" class="text-primary text-gradient font-weight-bold">Reset password</a>
                            </p>
                        @endif --}}
                        <p class="mt-4 text-sm text-center">
                            Don't have an account?
                            <a href="{{ url('register')}}" class="text-primary text-gradient font-weight-bold">Sign up</a>
                        </p>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
