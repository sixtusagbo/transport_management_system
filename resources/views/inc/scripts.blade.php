<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<script src="{{ asset('js/github_buttons.js')}}"></script>
  <script src="{{ asset('js/fontawesome.js')}}"></script>
<script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>
<script src="{{ asset('js/compressed.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>

@if (request()->is('users'))
  <script>
    $('.editUserBtn').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var url = '/users/' + id + '/edit';
      var callback = function (response) {
        $('#editUserModalBody').html(response);
      };
  
      $.get(url, callback);
  
    }); // Edit user ajax call
    $('.deleteUserBtn').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var url = '/users/' + id + '/showToRemove';
      var callback = function (response) {
        $('#deleteUserModalBody').html(response);
      };
  
      $.get(url, callback);
  
    }); // Delete user ajax call
  </script>
@endif

@if (request()->is('drivers'))
  <script>
    $('.editDriverBtn').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var url = '/drivers/' + id + '/edit';
      var callback = function (response) {
        $('#editDriverModalBody').html(response);
      };
  
      $.get(url, callback);
  
    }); // Edit driver ajax call
    $('.deleteDriverBtn').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var url = '/drivers/' + id + '/showToRemove';
      var callback = function (response) {
        $('#deleteDriverModalBody').html(response);
      };
  
      $.get(url, callback);
  
    }); // Delete driver ajax call
  </script>
@endif

@if (request()->is('vehicles'))
  <script>
    $('.editVehicleBtn').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var url = '/vehicles/' + id + '/edit';
      var callback = function (response) {
        $('#editVehicleModalBody').html(response);
      };
  
      $.get(url, callback);
  
    }); // Edit vehicle ajax call
    $(document).ready(function () {
      // Find the html elements
      var $make = $("#make"),
          $model = $("#model"),
          $options = $model.find("option");

      $make.on("change", function () {
              // I'm filtering model using the data-make attribute
              $model.html($options.filter('[data-make="' + this.value + '"]'));
              $model.trigger("change");
          }).trigger("change");
    }); // For car make and model
    $('.deleteVehicleBtn').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var url = '/vehicles/' + id + '/showToRemove';
      var callback = function (response) {
        $('#deleteVehicleModalBody').html(response);
      };
  
      $.get(url, callback);
  
    }); // Delete Vehicle ajax call
  </script>
@endif
