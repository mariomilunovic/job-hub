<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Category;


class SkillController extends Controller
{
    public function index()
    {
            $allSkills = Skill::all();
            $allCategories = Category::all();

        return view('models.skill.index')
            ->with('allSkills',$allSkills)
            ->with('allCategories',$allCategories);

    }
}
