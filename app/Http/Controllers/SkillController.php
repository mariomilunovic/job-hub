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

    public function show(Skill $skill)
    {
        //ddd($skill);
        return view('models.skill.show')
        ->with('skill',$skill);
    }

    public function user(User $user)
    {
        $skillCategories = [];

        $userSkills = $user->skills()->get();

        foreach($userSkills as $skill)
        {
            array_push($skillCategories,$skill->category);
        }

        //ddd(array_unique($skillCategories));

        return view ('models.skill.user')
        ->with('user',$user)
        ->with('userSkills',$userSkills)
        ->with('skillCategories',array_unique($skillCategories));
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
        return redirect(route('skill.index'));
    }


   


    public function validateSkill()
    {
        return request()->validate([
            'name' => 'required|max:255',
            'category_id' => 'required'
        ]);
    }


}
