<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function showDashboard(){
        //dd(auth()->user());
        return view('pages.dashboard');
    }

    function showHome(){
        return view('pages.home');
    }
}

