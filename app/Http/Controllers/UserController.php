<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user=User::find($id);
        return view ('users.show')->with('user',$user);
    }

    public function index()
    {

        $users = User::orderBy('updated_at','desc')->paginate(5);
        return view('users.index')->with('users',$users);
    }
}
