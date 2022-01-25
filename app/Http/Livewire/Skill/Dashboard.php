<?php

namespace App\Http\Livewire\Skill;

use Livewire\Component;

class Dashboard extends Component
{

    public $strongestSkill;
    public $weakestSkill;
    public $newestSkill;
    public $totalSkills;
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
        $this->totalSkills = $this->user->skills->count();
        $this->strongestSkill = $this->user->skills->last();
        $this->weakestSkill = $this->user->skills->first();
        $this->newestSkill = $this->user->skills->sortByDesc('pivot.created_at')->first();

    }

    public function render()
    {
        return view('livewire.skill.dashboard');
    }
}
