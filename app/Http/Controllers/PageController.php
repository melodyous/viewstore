<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PageController extends Controller
{
    public function index(){
        return view('index', [
            'title' => 'Login'
        ]);
    }

    public function info(){
        return view('home.info', [
            'title' => 'Info',
            'user' => User::first()
        ]);
    }

    public function home(){
        return view('home.index', [
            'title' => 'Home'
        ]);
    }

    // fungsi autentikasi user login
    public function authenticate( Request $request ){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'

        ]);

        if( Auth::attempt($credentials) ){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login Failed');
    }


    // fungsi logout
    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }


}
