<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Support\Facades\Hash;
use Monolog\Handler\FirePHPHandler;
use PhpParser\NodeVisitor\FirstFindingVisitor;

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

    public function skill(Skill $skill)
    {
        $users = $skill->users()->orderBy('pivot_points','desc')->paginate();
        //dd($users);
        return view('models.user.skills')
        ->with('users',$users)
        ->with('skill',$skill);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('models.user.create')->with('roles',$roles);
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

        toast()->success('Uspešan unos novog korisnika')->push();
        return redirect(route('user.show',$newUser));
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $user=User::find($id);

        return view('models.user.show')
            ->with('user',$user)
            ->with('userSkills',$user->skills)
            ->with('userBids',$user->skills)
            ->with('userJobs',$user->jobs);
    }

    public function profile()
    {
        $user=auth()->user();

        return view('models.user.show')
            ->with('user',$user)
            ->with('userSkills',$user->skills)
            ->with('userBids',$user->skills)
            ->with('userJobs',$user->jobs);
    }

    public function search()
    {
        return view('models.user.search');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $roles = Role::all();
        return view('models.user.edit')
            ->with('user', $user)
            ->with('roles',$roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6|max:20',
            'role_id' => 'required'
        ]);

        // dd($user);

        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->password = request('password');

        $role = Role::where('id',$user->role_id)->first();
        $user->roles()->detach($role);



        $role = Role::where('id',request('role_id'))->first();
        $user->roles()->attach($role);

        $user->save();
        toast()->success('Uspešna izmena podataka korisnika')->push();
        return redirect(route('user.show',$user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete(); //softdeleted
        toast()->success('Korisnički nalog je obrisan')->push();
        return redirect(route('user.index'));
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
