<?php

namespace App\Http\Livewire\Job;

use Livewire\Component;

class Dashboard extends Component
{

    public $myJobs;
    public $myJobsCollectingOffers;
    public $myJobsInProgress;
    public $myJobsFinished;
    public $myJobsCompleted;

    public function mount() // mount se pokreće čim se komponenta učita
    {
        $this->myJobs = auth()->user()->jobs->count();
        $this->myJobsCollectingOffers = auth()->user()->jobs->where('status_id',1)->count();
        $this->myJobsInProgress = auth()->user()->jobs->where('status_id',2)->count();
        $this->myJobsFinished = auth()->user()->jobs->where('status_id',3)->count();
        $this->myJobsCompleted = auth()->user()->jobs->where('status_id',4)->count();
    }


    public function render()
    {
        return view('livewire.job.dashboard');
    }
}
