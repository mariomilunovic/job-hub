<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    function logout()
    {
        auth()->logout();
        toast()->success('Uspešna odjava')->push();
        return redirect(route('page.home'));
    }
}
