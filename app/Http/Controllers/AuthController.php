<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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

    function login()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }

    function create(Request $request)
    {
        $userData = $this->validateUser();

            $newUser = User::create([
                'firstname'=>$userData['firstname'],
                'lastname'=>$userData['lastname'],
                'email'=>$userData['email'],
                'password'=>Hash::make($userData['password'])
            ]);



            if($newUser)
            {
                auth()->attempt($request->only('email','password'));
                return redirect(route('auth.dashboard'))->with('success', 'Registracija uspešna');
            }
            else
            {
                return back()->with('error', 'Došlo je do greške prilikom upisa u bazu');
            }
    }
    function dashboard()
    {
        return view('auth.dashboard');
    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ]);


        $user = User::where('email','=',$request->email)->first();
//        ddd($request);
        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('LoggedUserID',$user->id);
                return redirect(route('auth.profile'))->with('success', 'Uspešna prijava');
            }
            else
            {
                return back()->with('error','Neispravna lozinka');
            }

        }
        else
        {
            return back()->with('error','Nepoznata email adresa');
        }
    }

    function logout(){
        if(session()->has('LoggedUserID'))
        {
            session()->pull('LoggedUserID');
            return redirect(route('auth.login'))->with('success', 'Uspešna odjava');;
        }
    }



}
