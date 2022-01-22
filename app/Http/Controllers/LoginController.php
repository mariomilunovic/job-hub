<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function form()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:20'
        ]);

        $remember_me = $request->has('remember') ? true : false;
        //dd($remember_me);

        if (!auth()->attempt($request->only('email', 'password'),$remember_me))
        {
            toast()->danger('Neispravni email ili lozinka')->push();
            return back()->with('error', 'Neispravni podaci');
        }
        else
        {
            toast()->success('Uspešna prijava')->push();
        }

        return redirect(route('page.dashboard'));
    }
}
