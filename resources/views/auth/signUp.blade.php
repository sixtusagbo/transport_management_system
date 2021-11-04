
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png')}}">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.0')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
	<!-- <link rel="stylesheet" href="css/animations.css"> -->
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
	<link rel="stylesheet" href="{{ asset('css/main.css')}}" class="color-switcher-link">
	<!-- <script src="js/vendor/modernizr-2.6.2.min.js"></script> -->
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
       
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
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
                <div class="card-header" style="background-color: #fff;">
                  <h4 class="font-weight-bolder" style="text-align: center"> BOOK A TRIP</h4>
                  {{-- <p class="mb-0">Enter your email and password to register</p> --}}
                </div>
                <div class="card-body">
                  
                    <!-- <h5>Simple Tabs</h5> -->
                    <div class="divider-25 d-none d-xl-block"></div>
                    <!-- tabs start -->
                    <ul class="nav nav-tabs" role="tablist" style="justify-content: space-around">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab01" data-toggle="tab" href="#tab01_pane" role="tab" aria-controls="tab01_pane" aria-expanded="true">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab02" data-toggle="tab" href="#tab02_pane" role="tab" aria-controls="tab02_pane">Book A Trip</a>
                        </li>
                    </ul>
                    <div class="tab-content">
    
                        <div class="tab-pane fade show active" id="tab01_pane" role="tabpanel" aria-labelledby="tab01">
    
                            <h5>PERSONAL INFORMATION</h5>
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
    
                        <div class="tab-pane fade" id="tab02_pane" role="tabpanel" aria-labelledby="tab02">
    
                            <h5>BOOK A TRIP</h5>
                            
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
    
    
                    </div>
                    <!-- tabs end-->
                
                  
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
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>
  <script src="{{ asset('js/compressed.js')}}"></script>
	<script src="{{ asset('js/main.js')}}"></script>
</body>

</html>