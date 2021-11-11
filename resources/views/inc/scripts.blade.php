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
<script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>

@if (request()->is('users'))
  <script src="{{ asset('js/compressed.js')}}"></script>
  <script src="{{ asset('js/main.js')}}"></script>
  <script>
    $('.editUserBtn').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var url = '/users/' + id + '/edit';
      var callback = function (response) {
        $('#editUserModalBody').html(response);
      };
  
      $.get(url, callback);
  
    });
    $('.deleteUserBtn').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var url = '/users/' + id + '/showToRemove';
      var callback = function (response) {
        $('#deleteUserModalBody').html(response);
      };
  
      $.get(url, callback);
  
    });
  </script>
@endif

@if (request()->is('drivers'))
  <script src="{{ asset('js/compressed.js')}}"></script>
  <script src="{{ asset('js/main.js')}}"></script>
  <script>
    $('.editDriverBtn').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var url = '/drivers/' + id + '/edit';
      var callback = function (response) {
        $('#editDriverModalBody').html(response);
      };
  
      $.get(url, callback);
  
    });
    $('.deleteDriverBtn').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var url = '/drivers/' + id + '/showToRemove';
      var callback = function (response) {
        $('#deleteDriverModalBody').html(response);
      };
  
      $.get(url, callback);
  
    });
  </script>
@endif