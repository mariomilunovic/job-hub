<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobType::create(['name'=>'job type 1']);
        JobType::create(['name'=>'job type 2']);
        JobType::create(['name'=>'job type 3']);
    }
}
