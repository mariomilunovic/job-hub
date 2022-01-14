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
        $roleAdministrator = Role::where('name','administrator')->first();
        $roleSandardUser = Role::where('name','user')->first();



        $userAdministrator = User::create([
            'firstname'=>'Marko',
            'lastname'=>'Marković',
            'email'=>'marko@safemail.com',
            'password'=>Hash::make('123123')
        ]);
        $userAdministrator->roles()->attach($roleAdministrator);

        $userAdministrator = User::create([
            'firstname'=>'Petar',
            'lastname'=>'Petrović',
            'email'=>'petar@safemail.com',
            'password'=>Hash::make('123123')
        ]);
        $userAdministrator->roles()->attach($roleAdministrator);


        $userStandard = User::create([
            'firstname'=>'Kosta',
            'lastname'=>'Kostić',
            'email'=>'kosta@safemail.com',
            'password'=>Hash::make('123123')
        ]);
        $userStandard->roles()->attach($roleSandardUser);



        for ($i=1;$i<=10;$i++) {
            $userStandard = User::factory()->create();
            $userStandard->roles()->attach($roleSandardUser);
        }
    }

}
