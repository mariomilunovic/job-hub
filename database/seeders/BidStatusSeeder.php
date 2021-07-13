<?php

namespace Database\Seeders;

use App\Models\BidStatus;
use Illuminate\Database\Seeder;

class BidStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BidStatus::create(['name'=>'bid status 1']);
        BidStatus::create(['name'=>'bid status 2']);
        BidStatus::create(['name'=>'bid status 3']);
    }
}
