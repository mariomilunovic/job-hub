<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('updated_at','desc')->paginate(5);
        return view('models.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userdata = $this->validateUser();      //ovo je array

        $newUser = User::create([               //ovo je object
            'firstname'=>$userdata['firstname'],
            'lastname'=>$userdata['lastname'],
            'email'=>$userdata['email'],
            'password'=>Hash::make($userdata['password']),
        ]);
        $role = Role::where('id',$userdata['role_id'])->first();

        $newUser->roles()->attach($role);

        return redirect(route('users.index'))->with('success','Korisnik je uspešno unet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $userSkills = $user->skills;

        return view('models.user.show')
            ->with('user',$user)
            ->with('userSkills',$userSkills);
    }

    public function profile()
    {
        $loggedUser=auth()->user();
        $userSkills = $loggedUser->skills;
        return view ('models.user.show')
            ->with('user',$loggedUser)
            ->with('userSkills',$userSkills);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        return view('users.edit')->with(['user'=>$user,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validateUser()
    {
        return request()->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:20',
            'role_id' => 'required'
        ]);
    }
}
