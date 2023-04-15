@extends('layouts.passenger')

@section('script')
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
        $(document).ready(function() {
            payWithPaystack();
        });

        function payWithPaystack() {
            let handler = PaystackPop.setup({
                key: "{{ config('app.paystack.public_key') }}",
                email: "{{ Auth::user()->email }}",
                amount: {{ $amount * 100 }},
                ref: "{{ $transaction_ref }}",
                onClose: function() {
                    window.location = "{{ route('dashboard') }}";
                },
                callback: function(response) {
                    window.location =
                        "{{ route('verify_paystack', ['type' => $ticket_type, 'id' => $ticket_id]) }}?reference=" +
                        response.reference;
                }
            });

            handler.openIframe();
        }
    </script>
@endsection
