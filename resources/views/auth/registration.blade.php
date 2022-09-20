@extends('layouts.app')

@section('content')

<div class="container " style="min-height: 100vh">
    <div class="card m-4 mx-auto" id="auth">
        <div class="card-body">
            <div class="h3 fw-bold mb-2">Registration</div>
            <div class="h6 mb-4 fw-bold text-primary">PayPal information retrieved.</div>
            @php
                $name = explode(' ', $user_info->name);
                $address = $user_info->address->street_address . ', ' . $user_info->address->locality . ', ' . $user_info->address->region . ', ' . $user_info->address->country . ' ' . $user_info->address->postal_code;
            @endphp


            <form action="/register_user" method="post">
            @csrf
            <div class="h6">Firstname</div>
            <input type="text" class="form-control  mb-3"  value='{{ $name[0] }}' name="firstname" readonly>
            <div class="h6">Lastname</div>
            <input type="text" class="form-control f mb-3" value='{{ $name[1] }}' name="lastname" readonly>
            <div class="h6">Email</div>
            <input type="email" class="form-control f mb-3" value='{{ $user_info->email }}' name="email" readonly>
            <div class="h6">Address</div>
            <input type="address" class="form-control f mb-3" value='{{ $address }} ' name="address" readonly>
            <div class="h6">Password</div>
            @error('password') <div class="h6 text-danger">{{ $message }}</div> @enderror
            <input type="password" class="form-control f mb-3" name="password" placeholder="Create password">
            <div class="h6">Confirm Password</div>
            @error('confirm_password') <div class="h6 text-danger">{{ $message }}</div> @enderror
            <input type="password" class="form-control f mb-3" name="confirm_password" placeholder="Confirm password">
            <button class="btn btn-lg btn-success w-100 mb-4" type="submit">Register</button>

           
            <div class="h6 text-center text-muted mb-4">
                <a href="/">Login instead</a>
            </div>
            </form>
        </div>
    </div>


    <!-- https://www.sandbox.paypal.com/connect?flowEntry=static&client_id=[client id]&scope=[list of scopes]&redirect_uri=[return URL] -->
    <!-- nativexo://paypalpay -->
</div>

@endsection