<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    function home(){

        return view('page.home');

    }
    function dashboard(){

        return view('page.dashboard');
    }

    function test(){

        toast()->success('Testiranje toast poruke.')->push();
        return view('page.home');
    }

}

