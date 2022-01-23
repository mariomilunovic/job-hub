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
        for ($i=1;$i<=20;$i++) {
            $newJob = Job::factory()->create();
            $randomSkill = Skill::where('id', random_int(1, 19))->get();
            $newJob->skills()->attach($randomSkill);
        }
    }
}
