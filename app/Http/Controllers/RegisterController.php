<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RegisterController extends Controller
{
    public function show(){
        //validation for redirect to home in case it's already logged in
        if(Auth::check()){
            return redirect('/home');
        }

        return view('auth.register');
    }

    //use of an request object for specific controller
    //validation is done in request
    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        
        //Obtains role selected in regsiter form        
        $roles = $request->input('role');

        //Associate role with user in table user_roles with attach method
        
        $user->role()->attach($roles);

        //it lets to send the email verification message
        $user->sendEmailVerificationNotification();
        
        return redirect('/login')->with('success', 'Cuenta creada exitosamente');
    }
}
