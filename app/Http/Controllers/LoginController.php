<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        //validation for redirect to home in case it's already logged in
        if(Auth::check()){
            return redirect('/home');
        }

        return view('auth.login');
    }

    //auth credential logic for fields returned in request
    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();

        //validation of user or email
        if(!Auth::validate($credentials)){
            return redirect()->to('/login')->withErrors('Usario y/o contraseña incorrectos');
        }
        
        //creates an user with credentials auth
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        //login and session creations auto with laravel
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user){
        return redirect('/home');
    }
}
