<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name'=>'Informacione tehnologije']);
        Category::create(['name'=>'Grafički dizajn']);
        Category::create(['name'=>'Prevođenje']);
        Category::create(['name'=>'Marketing']);
        Category::create(['name'=>'Edukacija']);
    }
}
