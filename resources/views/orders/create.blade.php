@extends('layouts.app')
@section('title', 'Order')
@section('single','Create order')
@section('store')
    {{ route('orders.store',Auth::user()->cart) }}
@endsection
@section('inputs')
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&components=buttons"></script>
    <input hidden="true" class="form-control" type="text" name="state" value="Processing" >
    <label class="form-label">Address</label>
    <select class="form-control bg-light" name="address">
        @foreach (Auth::user()->addresses as $address)
            <option value="{{$address->street}}, {{$address->city}}, {{$address->country}} ">{{$address->street}}, {{$address->city}}, {{$address->country}} </option>
        @endforeach
    </select></br>
    <label class="form-label">Phone</label>
    <input class="form-control" type="text" name="phone" placeholder="Phone" value="{{Auth::user()->phone}}" required="true" ></br>
    <label class="form-label">Payment method</label>
    <select class="form-control bg-light" name="payment">
        @foreach ($payments as $payment)
            <option value="{{$payment->name}}">{{$payment->name}}</option>
        @endforeach
    </select></br>
    <input hidden="true" class="form-control" type="number" name="user_id" value="{{Auth::user()->id}}" >
    <label class="form-label">Amount</label>
    <p class="form-control-plaintext mb-2">{{ $totalAmount }} €</p>
    <input type="hidden" name="totalPrice" value="{{ $totalAmount }}">
    <div id="paypalButton"></div>
    <script>
            paypal.Buttons({
                createOrder: function(data,actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: {{$totalAmount}}
                            }
                        }]
                    });
                },
                onApprove: function(data,actions) {
                    return fetch('/paypal/process/' + data.orderID)
                    .then(res => res.json())
                    .then(function(response) {
                        if(!response.success) {
                            const msg = 'Sorry, your transaction could not be processed';
                            return alert(msg);
                        }
                        return alert("buen trabajo");
                    });
                },
                onError: function(data, actions) {
                    console.log(err);
                }
            }).render('#paypalButton');
    </script>
@endsection