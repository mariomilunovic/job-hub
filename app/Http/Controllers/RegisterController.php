<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function validateUser()
    {
        return request()->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:20',
        ]);
    }

    function form()
    {
        return view('auth.register');
    }

    function register(Request $request)
    {
        $userData = $this->validateUser();

        $newUser = User::create([
            'firstname'=>$userData['firstname'],
            'lastname'=>$userData['lastname'],
            'email'=>$userData['email'],
            'password'=>Hash::make($userData['password'])
        ]);
        $roleSandardUser = Role::where('name','user')->first();

        $newUser->roles()->attach($roleSandardUser);

        if($newUser)
        {
            auth()->attempt($request->only('email','password'));
            toast()->success('Uspešna registracija')->push();
            return redirect(route('showDashboard'))->with('success', 'Registracija uspešna');
        }
        else
        {
            return back()->with('error', 'Došlo je do greške prilikom upisa u bazu');
        }
    }
}
