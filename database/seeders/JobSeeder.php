<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Skill;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=10;$i++) {
            $newJob = Job::factory()->create();
            $randomSkill1 = Skill::where('id', random_int(1, 5))->get();
            $newJob->skills()->attach($randomSkill1);

            $randomSkill2 = Skill::where('id', random_int(6, 10))->get();
            $newJob->skills()->attach($randomSkill2);

        }
    }
}
