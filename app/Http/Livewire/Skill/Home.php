<?php

namespace App\Http\Livewire\Skill;

use Livewire\Component;
use App\Models\Skill;

class Home extends Component
{


    public $skillWithLargestNumberOfUsers;
    public $skillWithLargestNumberOfJobs;
    public $totalSkills;
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
        $this->totalSkills = Skill::all()->count();
        $this->skillWithLargestNumberOfUsers = Skill::withCount('users')->get()->sortByDesc('users_count')->first();
        $this->skillWithLargestNumberOfJobs = Skill::withCount('jobs')->get()->sortByDesc('jobs_count')->first();


    }

    public function render()
    {
        return view('livewire.skill.home');
    }
}
