<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;


class PaypalController extends Controller
{
    //





    public function paypal_login(Request $req){

        //check if authorization code exist
        if($req->code){

            //api call to get refresh_token
            $response = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))->asForm()->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
                'grant_type' => 'authorization_code',
                'code' => $req->code
            ]);

            //check if api call is successful
            if($response->successful()){

                $get_access_token = json_decode($response);

                //api call to fetch fresh access_token
                $response = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))->asForm()->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $get_access_token->refresh_token
                ]);
                
                $get_access_token = json_decode($response);
    
                //api call to get user info
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $get_access_token->access_token
                ])->get('https://api-m.sandbox.paypal.com/v1/identity/oauth2/userinfo');
    
                $user_info = json_decode($response);
                    
                $email = $user_info->email;

                $user = User::where('email', '=' , $email)->first();
    
                if($user){
                    //user is already in DB
                    session(['loggeduser' => $user->id]);
                    return redirect('/profile')->with('message', 'You are now logged in using PayPal');
                }else{
                    //if user not in DB, Register
                    session(['user_info' => json_encode($user_info)]);
                    return redirect('/registration');
                }
                
                // return $response;
            }else{
                return redirect('/');
            }
          
            // return view('profile', [$user_info]);
        }else{
            return redirect('/');
        }
    
    }
}
