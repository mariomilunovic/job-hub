<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;
use App\Models\Category;


class SkillController extends Controller
{
    public function index()
    {
        $allCategories = Category::all();

        return view('models.skill.index')
        ->with('allCategories',$allCategories);

    }

    public function user_skills( User $user)
    {
        $userSkills = $user->skills()->get();
        $allCategories = Category::all();

        return view ('models.skill.user_skills')
        ->with('userSkills',$userSkills)
        ->with('allCategories',$allCategories);
    }

    public function create()
    {
        $allCategories = Category::all();
        return view ('models.skill.create')
        ->with('allCategories',$allCategories);
    }


    public function store(Request $request)
    {
        Skill::create($this->validateSkill());

        toast()->success('Uspešan unos nove veštine')->push();
        return redirect(route('skills.index'));
    }


    public function validateSkill()
    {
        return request()->validate([
            'name' => 'required|max:255',
            'category_id' => 'required'
        ]);
    }
}
