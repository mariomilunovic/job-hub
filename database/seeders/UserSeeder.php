<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        $roleManager = Role::where('name','manager')->first();
        $roleSandardUser = Role::where('name','user')->first();

        $userAdministrator = User::create([
            'firstname'=>'Mario',
            'lastname'=>'Milunović',
            'email'=>'mario.milunovic@gmail.com',
            'password'=>Hash::make('123123')
        ]);
        $userAdministrator->roles()->attach($roleAdministrator);



        $userManager = User::create([
            'firstname'=>'Petar',
            'lastname'=>'Petrović',
            'email'=>'petar.petrovic@safemail.com',
            'password'=>Hash::make('123123')
        ]);
        $userManager->roles()->attach($roleManager);




        $userStandard = User::create([
            'firstname'=>'Marko',
            'lastname'=>'Marković',
            'email'=>'marko.markovic@safemail.com',
            'password'=>Hash::make('123123')
        ]);
        $userStandard->roles()->attach($roleSandardUser);



        for ($i=1;$i<=10;$i++) {
            $userStandard = User::factory()->create();
            $userStandard->roles()->attach($roleSandardUser);
        }
    }
}
