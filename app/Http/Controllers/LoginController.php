<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:20'
        ]);

        if (!auth()->attempt($request->only('email', 'password'),$request->input('remember'))) {
            toast()->danger('Neispravni email ili lozinka')->push();
            return back()->with('error', 'Neispravni podaci');
        }
        toast()->success('Uspešna prijava')->push();
        return redirect(route('showDashboard'))->with('success', 'Prijava uspešna');
    }
}
