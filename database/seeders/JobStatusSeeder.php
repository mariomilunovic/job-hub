<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobStatus;

class JobStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobStatus::create(['name'=>'Prikuplja ponude']);
        JobStatus::create(['name'=>'Radovi u toku']);
        JobStatus::create(['name'=>'Radovi isporučeni']);
        JobStatus::create(['name'=>'Radovi prihvaćeni']);
    }
}
