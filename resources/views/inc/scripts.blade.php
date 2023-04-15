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
<script src="{{ asset('js/github_buttons.js') }}"></script>
<script src="{{ asset('js/fontawesome.js') }}"></script>
<script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.0') }}"></script>
<script src="{{ asset('js/compressed.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@if (request()->is('users'))
    <script>
        $('.editUserBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var url = '/users/' + id + '/edit';
            var callback = function(response) {
                $('#editUserModalBody').html(response);
            };

            $.get(url, callback);

        }); // Edit user ajax call
        $('.deleteUserBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var url = '/users/' + id + '/showToRemove';
            var callback = function(response) {
                $('#deleteUserModalBody').html(response);
            };

            $.get(url, callback);

        }); // Delete user ajax call
    </script>
@endif

@if (request()->is('drivers'))
    <script>
        $('.editDriverBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var url = '/drivers/' + id + '/edit';
            var callback = function(response) {
                $('#editDriverModalBody').html(response);
            };

            $.get(url, callback);

        }); // Edit driver ajax call
        $('.deleteDriverBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var url = '/drivers/' + id + '/showToRemove';
            var callback = function(response) {
                $('#deleteDriverModalBody').html(response);
            };

            $.get(url, callback);

        }); // Delete driver ajax call
    </script>
@endif

@if (request()->is('vehicles'))
    <script>
        $('.editVehicleBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var url = '/vehicles/' + id + '/edit';
            var callback = function(response) {
                $('#editVehicleModalBody').html(response);
            };

            $.get(url, callback);

        }); // Edit vehicle ajax call
        $(document).ready(function() {
            // Find the html elements
            var $make = $("#make"),
                $model = $("#model"),
                $options = $model.find("option");

            $make.on("change", function() {
                // I'm filtering model using the data-make attribute
                $model.html($options.filter('[data-make="' + this.value + '"]'));
                $model.trigger("change");
            }).trigger("change");
        }); // For car make and model
        $('.deleteVehicleBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var url = '/vehicles/' + id + '/showToRemove';
            var callback = function(response) {
                $('#deleteVehicleModalBody').html(response);
            };

            $.get(url, callback);

        }); // Delete Vehicle ajax call
    </script>
@endif

@if (request()->is('destinations'))
    <script>
        $('.editDestinationBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var url = '/destinations/' + id + '/edit';
            var callback = function(response) {
                $('#editDestinationModalBody').html(response);
            };

            $.get(url, callback);

        }); // Edit destination ajax call
    </script>
@endif

{{-- Admin Dashboard Scripts --}}
@if (request()->is('dashboard') && Auth::user()->type == 1)
    <script>
        $('.loadTicket').click(function(e) {
            e.preventDefault();
            var id = $('#findTicket').val();
            // return console.log(id);
            var url = '/trips/' + id + '/pay';
            var callback = function(response) {
                $('#payTicket').html(response);
            };

            $.get(url, callback);

        }); // load ticket ajax call
    </script>
@endif

{{-- Passenger Dashboard Scripts --}}
@if (request()->is('dashboard') && Auth::user()->type == 0)
    <script>
        $(document).ready(function() {
            $('#bookTicketSubmit').hide();
            $('#loadDestination').change(function(e) {
                e.preventDefault();
                if ($('#loadDestination').val() != '') {
                    var id = $('#loadDestination').val();
                    var url = '/trips/' + id + '/destinationDetails';
                    var callback = function(response) {
                        $('#destinationDetails').html(response);
                    };

                    $.get(url, callback);

                    $('#bookTicketSubmit').show();
                }
            });
        });

        $('.viewTicketBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var url = '/trips/' + id;
            var callback = function(response) {
                $('#viewTicketModalBody').html(response);
            };

            $.get(url, callback);

        }); // View ticket ajax call
    </script>
@endif

@if (request()->is('passenger/send_cargo') && Auth::user()->type == 0)
    <script>
        $(document).ready(function() {
            $('#cargoError').hide();
            $('#bookCargoSubmit').hide();

            var $answer = '';
            $('#bookCargoCalculate').click(function(e) {
                if ($('#cargoName').val() == '' || $('#cargoNature').val() == '' || $('#cargoWeight')
                    .val() == '' || $('#cargoDestination').val() == '') {
                    // Display error on the modal
                    $('#cargoError').show();
                    return $('#cargoError').html('Please fill in all the fields!');
                } else {
                    // Calculate and display the amount
                    var nature, weight, destination_id;
                    nature = $('#cargoNature').val();
                    weight = $('#cargoWeight').val();
                    destination_id = $('#cargoDestination').val();
                    var url = '/cargo_amount/' + nature + '/' + weight + '/' + destination_id;
                    var callback = function(response) {
                        $('#cargoDetails').html(response);
                    };

                    $.get(url, callback);

                    $('#bookCargoCalculate').hide();
                    $('#bookCargoSubmit').show();
                }

            }); // Calculate amount
        });

        $('.viewTicketBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var url = '/cargos/' + id;
            var callback = function(response) {
                $('#viewTicketModalBody').html(response);
            };

            $.get(url, callback);

        }); // View ticket ajax call
    </script>
@endif
