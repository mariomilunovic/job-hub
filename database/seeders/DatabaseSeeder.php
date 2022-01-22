<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(JobStatusSeeder::class);
        $this->call(BidStatusSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SkillSeeder::class);
       // $this->call(JobSeeder::class);
       // $this->call(BidSeeder::class);
        $this->call(TransactionTypeSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(BankAccountSeeder::class);
    }
}
