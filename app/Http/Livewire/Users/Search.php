<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class Search extends Component
{

    use WithPagination;
    public $allUsers;
    public $allRoles;
    public $newuser;
    public $query;
    public $role_id;
    public $error;
    public $message = "";
    public $messageClass = "";

    public $firstname, $lastname, $email, $password, $password_confirmation;

    public function mount() // mount se pokreće čim se komponenta učita
    {
        $this->allUsers = User::latest()->take(7)->get();
        $this->allRoles = Role::all();
    }

    public function updated($query)
    {
        if(!($this->query))
        {
            $this->messageClass = "";
            $this->message = "";
            $this->allUsers = User::latest()->take(7)->get();
        }
        else
        {
            //sleep(1); // stavljeno radi simuliranja loading animacije
            $queryResult = User::where('lastname','like','%'.$this->query.'%')->orderBy('created_at', 'DESC')->take(7)->get();
            if(count($queryResult )>0)
            {
                $this->messageClass = "text-success font-weight-bold";
                $this->allUsers = $queryResult ;
                $this->message = "Ukupan broj pronađenih korisnika: ".count($queryResult );
            }
            else
            {
                $this->messageClass = "text-danger font-weight-bold";
                $this->allUsers = $queryResult ;
                $this->message = "Ukupan broj pronađenih korisnika: ".count($queryResult );
            }
        }
    }


    public function saveUser()
    {

        $this->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:20',
            'role_id' => 'required'
        ]);


        $newUser = User::create([
            'firstname'=>$this->firstname,
            'lastname'=>$this->lastname,
            'email'=>$this->email,
            'password'=>Hash::make($this->password)
        ]);

        if ($newUser)
        {
            $newUser->roles()->attach(Role::find($this->role_id));
            $this->dispatchBrowserEvent('CloseAddUserModal');
        }
    }


    public function render()
    {
        return view('livewire.users.search');
    }
}
