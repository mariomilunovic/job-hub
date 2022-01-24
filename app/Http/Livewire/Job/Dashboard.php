<?php

namespace App\Http\Livewire\Job;

use Livewire\Component;

class Dashboard extends Component
{

    public $myJobs;
    public $myJobInProgress;

    public function mount() // mount se pokreće čim se komponenta učita
    {

    }


    public function render()
    {
        return view('livewire.job.dashboard');
    }
}
