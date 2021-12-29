<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function showDashboard(){
        return view('pages.dashboard');
    }

    function showHome(){
        return view('pages.home');
    }
}

