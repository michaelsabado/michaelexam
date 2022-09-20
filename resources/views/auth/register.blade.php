@extends('layouts.app')

@section('content')

<div class="container "  style="min-height: 100vh">
    <div class="card m-4 mx-auto" id="auth">
        <div class="card-body">
            <div class="h3 fw-bold mb-5">Registration</div>
        

            <form action="/get_register" method="post">
            @csrf
            <div class="h6">Firstname</div>
            @error('firstname') <div class="h6 text-danger">{{ $message }}</div> @enderror
            <input type="text" class="form-control mb-3"  value='{{ old('firstname') }}' name="firstname" >
            <div class="h6">Lastname</div>
            @error('lastname') <div class="h6 text-danger">{{ $message }}</div> @enderror
            <input type="text" class="form-control f mb-3"  value='{{ old('lastname') }}' name="lastname" >
            <div class="h6">Email</div>
            @error('email') <div class="h6 text-danger">{{ $message }}</div> @enderror
            <input type="text" class="form-control f mb-3"  value='{{ old('email') }}' name="email" >
            <div class="h6">Address</div>
            @error('address') <div class="h6 text-danger">{{ $message }}</div> @enderror
            <input type="address" class="form-control f mb-3"  value='{{ old('address') }}' name="address" >
            <div class="h6">Password</div>
            @error('password') <div class="h6 text-danger">{{ $message }}</div> @enderror
            <input type="password" class="form-control f mb-3" name="password" >
            <div class="h6">Confirm Password</div>
            @error('confirm_password') <div class="h6 text-danger">{{ $message }}</div> @enderror
            <input type="password" class="form-control f mb-3" name="confirm_password">
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