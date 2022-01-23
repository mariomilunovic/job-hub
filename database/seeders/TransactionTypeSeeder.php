<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransactionType;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionType::create(['name'=>'uplata']);
        TransactionType::create(['name'=>'isplata']);
        TransactionType::create(['name'=>'rezervacija']);
        TransactionType::create(['name'=>'plata']);
    }
}
