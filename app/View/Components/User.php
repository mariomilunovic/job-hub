<?php

namespace App\View\Components;

use Illuminate\View\Component;

class User extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $user;
    public $expanded;
    public function __construct($user,$expanded=false)
    {
        $this->user = $user;
        $this->expanded = $expanded;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user');
    }
}
