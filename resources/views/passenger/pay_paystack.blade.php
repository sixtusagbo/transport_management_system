@extends('layouts.passenger')

@section('script')
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
        $(document).ready(function() {
            payWithPaystack();
        });

        function payWithPaystack() {
            let handler = PaystackPop.setup({
                key: 'pk_test_12421da34ba717d2c7ab2ce562718bc1bc1b3e53',
                email: "{{ Auth::user()->email }}",
                amount: {{ $amount * 100 }},
                ref: "{{ $transaction_ref }}",
                onClose: function() {
                    window.location = "{{ route('dashboard') }}";
                },
                callback: function(response) {
                    window.location = "{{ route('verify_paystack', $ticket_id) }}?reference=" +
                        response.reference;
                }
            });

            handler.openIframe();
        }
    </script>
@endsection
