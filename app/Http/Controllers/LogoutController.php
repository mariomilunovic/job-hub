<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    function logout()
    {
        auth()->logout();
        return redirect(route('showHome'))->with('success', 'Uspešna odjava');
    }
}
