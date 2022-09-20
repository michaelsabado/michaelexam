@extends('layouts.app')

@section('content')

<?php
// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v1/oauth2/token',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS => 'grant_type=client_credentials&code=EEOE7dkcJDpJ1lwuGjwS02iZmYNSmmRevUT2c7l75NpZE19eK-JhUycpHAjDipu6SbQzxs3_VsKhqLmx',
//   CURLOPT_HTTPHEADER => array(
//     'Authorization: Basic QVlpVV9QV1dSQUt2WU5FWjBCSVB4Sy1xdGtwLUwxVGY4V2ZGa3R6WU9BV0xSaTVqbDRDcmthOVlwQ1lCc1Vfdk1US2xYY0E5VlJBR1BfRGw6RUVPRTdka2NKRHBKMWx3dUdqd1MwMmlabVlOU21tUmV2VVQyYzdsNzVOcFpFMTllSy1KaFV5Y3BIQWpEaXB1NlNiUXp4czNfVnNLaHFMbXg='
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// $res = json_decode($response);

// print_r($res->app_id);


?>
<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="card" id="auth">
        <div class="card-body">
            <div class="h3 fw-bold mb-4">Login</div>
 
            @if(session('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             @endif
            <form action="login_user" method="post">
            @csrf
            @error('email') <div class="h6 text-danger">{{ $message }}</div>  @enderror
            <input type="text" class="form-control form-control-lg mb-3" placeholder="Email" name="email" value="{{ old('email') }}">
            @error('password') <div class="h6 text-danger">{{ $message }}</div>  @enderror
            <input type="password" class="form-control form-control-lg mb-3" placeholder="Password" name="password">
            <button class="btn btn-lg btn-success w-100 mb-4" type="submit"> Login</button>
           
            </form>
            <div class="h6 text-center text-muted mb-4">or</div>
            <!-- <span id='lippButton'></span> -->
            <a href="https://www.sandbox.paypal.com/connect?flowEntry=static&client_id=Aa-BNBLuvLcUkkc4viMLmMuX6-7Shr6fiHzV5ve_zpyxnC8QFEXmgD524L70rkFxtpGZYjRfEVbnDpzN&scope=openid%20profile%20email%20address%20https%3A%2F%2Furi.paypal.com%2Fservices%2Fpaypalattributes&redirect_uri=http%3A%2F%2F127.0.0.1%3A8000%2Fpaypal_login" class="btn btn-lg btn-light w-100 mb-4 shadow-sm border align-items-center justify-content-center pe-4"  style="display: flex;"><img src="https://pngimg.com/uploads/paypal/paypal_PNG7.png" height="40" alt=""> <span>Login using PayPal</span></a>
            <div class="h6 text-center text-muted mb-4">
                <a href="/register">No account yet? Register here</a>
            </div>
        </div>
    </div>


    <!-- https://www.sandbox.paypal.com/connect?flowEntry=static&client_id=[client id]&scope=[list of scopes]&redirect_uri=[return URL] -->
    <!-- nativexo://paypalpay -->
</div>


@endsection