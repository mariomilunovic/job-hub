<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrator = Role::where('name','administrator')->first();
        $role_user = Role::where('name','user')->first();


        // administrators 1
        $administrator = User::create([
            'firstname'=>'Marko',
            'lastname'=>'Marković',
            'email'=>'marko@safemail.com',
            'password'=>Hash::make('123123'),
            'balance'=>1000
        ]);
        $administrator->roles()->attach($role_administrator);


        // administrator 2
        $administrator = User::create([
            'firstname'=>'Petar',
            'lastname'=>'Petrović',
            'email'=>'petar@safemail.com',
            'password'=>Hash::make('123123'),
            'balance'=>1000
        ]);
        $administrator->roles()->attach($role_administrator);


        // user 1
        $userStandard = User::create([
            'firstname'=>'Kosta',
            'lastname'=>'Kostić',
            'email'=>'kosta@safemail.com',
            'password'=>Hash::make('123123'),
            'balance'=>1000
        ]);
        $userStandard->roles()->attach($role_user);


        // user 2
        $userStandard = User::create([
            'firstname'=>'Ana',
            'lastname'=>'Antić',
            'email'=>'ana@safemail.com',
            'password'=>Hash::make('123123'),
            'balance'=>1000
        ]);
        $userStandard->roles()->attach($role_user);


        // more users
        for ($i=1;$i<=10;$i++) {
            $userStandard = User::factory()->create();
            $userStandard->roles()->attach($role_user);
        }
    }

}
