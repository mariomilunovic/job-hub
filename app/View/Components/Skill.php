<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Skill extends Component
{

    public $skill;
    public $user;
    public $expanded;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skill,$user,$expanded=false)
    {
        if($user)
        {
            $this->user = $user;
        }
        else
        {
            $this->user = auth()->user();
        }

        $this->skill = $skill;
        $this->expanded = $expanded;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.skill');
    }
}
