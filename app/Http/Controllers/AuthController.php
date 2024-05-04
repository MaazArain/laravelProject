<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function home()
    {
        return view('home');
    }
    // Logout Functionalites
    public function logout(Request $request)
    {
       Auth::logout();
       return redirect('/');
    }



}
