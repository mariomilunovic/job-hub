<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Role;
use App\Models\User;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

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


         //temporary payment methods for testing///////////////////
         $newPaymentMethod = PaymentMethod::create([
            'name' => 'VISA',
            'card_number' => 1234123412341234,
            'name_on_card' => $userData['firstname'],
            'exp_month' => 12,
            'exp_year' => 2027,
            'cvc' => 333,
            'user_id'  => $newUser->id,
        ]);

        $newBankAccount = BankAccount::create([
            'name' => 'Moja Banka',
            'account_number' => '123-1231231231231-23',
            'account_owner_name' =>  'Ima Prezime',
            'account_owner_address' => 'Adresa',
            'user_id'  => $newUser->id,
        ]);
        /////////////////////////////////////////////////////////////



        if($newUser)
        {
            auth()->attempt($request->only('email','password'));
            toast()->success('Uspešna registracija')->push();
            return redirect(route('page.dashboard'));
        }
        else
        {
            toast()->success('Došlo je do greške prilikom upisa u bazu')->push();
            return back();
        }
    }
}
