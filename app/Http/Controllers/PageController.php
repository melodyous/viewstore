<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        return view('index', [
            'title' => 'Login'
        ]);
    }

    public function info(){
        return view('index', [
            'title' => 'Info',
        ]);
    }
}
