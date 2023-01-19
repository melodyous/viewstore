<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;

class PageController extends Controller
{
    public function index(){
        return view('index', [
            'title' => 'Login',
            'categories' => Category::all()
        ]);
    }

    public function info(){
        return view('home.info', [
            'title' => 'Info',
            'user' => User::first(),
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }

    public function home(){
        return view('home.orders.index', [
            'title' => 'Home',
            'orders' => Order::all(),
            'categories' => Category::all(),
            'users' => User::all()
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
