<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Bid extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $bid;
    
    public function __construct($bid)
    {
        $this->bid = $bid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bid');
    }
}
