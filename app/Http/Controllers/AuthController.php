<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{  
    
    
    public function login_user(Request $req){
        
            $req->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $user = User::where('email', '=', $req->input('email'))->first();
            if($user){
                if(Hash::check($req->input('password'), $user->password)){
                    session(['loggeduser' => $user->id]);
                    return redirect('/profile')->with('message', 'You are now logged in');
                }else {
                    return back()->with('message','Incorrect Password');
                }
            }else {
                return back()->with('message','Account not found');
            }

    }
    
    //fetch paypal info and place to registration
    public function registration(){
        if(session('user_info')){
            $user_info = json_decode(session('user_info'));
            return view('auth.registration', compact('user_info'));
        } else{
            return redirect('/profile');
        } 
      
    }


    //registration for paypal
    public function register_user(Request $req){

            $req->validate([
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ]); 

            $user = User::create([
                'firstname' => $req->input('firstname'),
                'lastname' => $req->input('lastname'),
                'email' => $req->input('email'),
                'address' => $req->input('address'),
                'password' => Hash::make($req->input('password')),
            ]);

            // login immediately
            session(['loggeduser' => $user->id]);
            return redirect('/profile')->with('message', 'You are now registered using PayPal');
    }

      //normal registration
      public function get_register(Request $req){

        $req->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]); 

        $user = User::create([
            'firstname' => $req->input('firstname'),
            'lastname' => $req->input('lastname'),
            'email' => $req->input('email'),
            'address' => $req->input('address'),
            'password' => Hash::make($req->input('password')),
        ]);

        // login immediately
        session(['loggeduser' => $user->id]);
        return redirect('/profile')->with('message', 'You are now registered');
}

    
    //profile page
    public function profile(){
        $user = User::find(session('loggeduser'));

        return view('profile', compact('user'));
    }

    //logout
    public function logout(){
        session()->flush();

        return redirect('/');
    }
    
}
