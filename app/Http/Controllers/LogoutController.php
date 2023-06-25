<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout(){
        //libera el flujo de la sesion
        Session::flush();

        Auth::logout();

        return redirect()->to('/login');
    }
}
