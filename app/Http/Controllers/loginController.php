<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Request 
use App\Http\Requests\LoginRequest as R_Login;

class loginController extends Controller
{
    public function view_login(){
        return view('Login.login');
    }


    public function login_user(R_Login $request){
        // logic
        $value = $request->validated();
        // untuk login 
        $user = Auth::attempt(["email" => $value['email'],"password" => $value['password']]);
        if(!$user){
            return back();
        }
        $user = Auth::user();
        $token = $user->createToken($user['email'],[$user->getRoleNames()])->plainTextToken;
        return redirect()->route('admin.dashboard');
    }


    

    public function logOut(){
        if(!Auth::check()){
            return false;
        }
        
        Auth::user()->tokens()->each(function($token){
                dd(Auth::user()->id == $token->tokenable_id);
                if(Auth::user()->id == $token->tokenable_id){
                    $token->delete();
                }
                
        });
        return redirect()->route('login');
    }



}
