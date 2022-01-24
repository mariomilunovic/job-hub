<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newSkill = Skill::create(['name' => 'Java','category_id' => 1]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 5]);
        $newSkill->users()->attach($randomUser2, ['points' => 2]);

        $newSkill = Skill::create(['name' => 'PHP','category_id' => 1]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 4]);
        $newSkill->users()->attach($randomUser2, ['points' => 2]);

        $newSkill = Skill::create(['name' => 'C#','category_id' => 1]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 5]);
        $newSkill->users()->attach($randomUser2, ['points' => 2]);

        $newSkill = Skill::create(['name' => 'React','category_id' => 1]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 5]);
        $newSkill->users()->attach($randomUser2, ['points' => 2]);

        $newSkill = Skill::create(['name' => 'Python','category_id' => 1]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 2]);
        $newSkill->users()->attach($randomUser2, ['points' => 3]);

        $newSkill = Skill::create(['name' => 'Obrada fotografija','category_id' => 2]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 1]);
        $newSkill->users()->attach($randomUser2, ['points' => 7]);

        $newSkill = Skill::create(['name' => '3D Modelovanje','category_id' => 2]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 12]);
        $newSkill->users()->attach($randomUser2, ['points' => 2]);

        $newSkill = Skill::create(['name' => 'Dizajn logotipa','category_id' => 2]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 2]);
        $newSkill->users()->attach($randomUser2, ['points' => 4]);

        $newSkill = Skill::create(['name' => 'UX Dizajn','category_id' => 2]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 6]);
        $newSkill->users()->attach($randomUser2, ['points' => 2]);

        $newSkill = Skill::create(['name' => 'Engleski','category_id' => 3]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 2]);
        $newSkill->users()->attach($randomUser2, ['points' => 4]);

        $newSkill = Skill::create(['name' => 'Nemački','category_id' => 3]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 2]);
        $newSkill->users()->attach($randomUser2, ['points' => 4]);

        $newSkill = Skill::create(['name' => 'Kineski','category_id' => 3]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 2]);
        $newSkill->users()->attach($randomUser2, ['points' => 1]);

        $newSkill = Skill::create(['name' => 'Facebook marketing','category_id' => 4]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 3]);
        $newSkill->users()->attach($randomUser2, ['points' => 2]);

        $newSkill = Skill::create(['name' => 'Email marketing','category_id' => 4]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 2]);
        $newSkill->users()->attach($randomUser2, ['points' => 6]);

        $newSkill = Skill::create(['name' => 'Google Adsense','category_id' => 4]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 2]);
        $newSkill->users()->attach($randomUser2, ['points' => 2]);

        $newSkill = Skill::create(['name' => 'Japanski jezik','category_id' => 5]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 1]);
        $newSkill->users()->attach($randomUser2, ['points' => 2]);

        $newSkill = Skill::create(['name' => 'Hemija','category_id' => 5]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 1]);
        $newSkill->users()->attach($randomUser2, ['points' => 2]);

        $newSkill = Skill::create(['name' => 'Matematika','category_id' => 5]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 2]);
        $newSkill->users()->attach($randomUser2, ['points' => 2]);

        $newSkill = Skill::create(['name' => 'Java','category_id' => 5]);
        $randomUser1 = User::where('id', random_int(1, 5))->get();
        $randomUser2 = User::where('id', random_int(6, 13))->get();
        $newSkill->users()->attach($randomUser1, ['points' => 2]);
        $newSkill->users()->attach($randomUser2, ['points' => 1]);
    }
}
