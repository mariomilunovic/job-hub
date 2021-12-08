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
        BidStatus::create(['name'=>'Kreirana']);
        BidStatus::create(['name'=>'Izabrana']);
        BidStatus::create(['name'=>'Isporučena']);
        BidStatus::create(['name'=>'Prihvaćena']);
    }
}
