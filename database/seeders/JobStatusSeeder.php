<?php

namespace Database\Seeders;

use App\Models\JobStatus;

use Illuminate\Database\Seeder;

class JobStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobStatus::create(['name'=>'job status 1']);
        JobStatus::create(['name'=>'job status 2']);
        JobStatus::create(['name'=>'job status 3']);
    }
}
