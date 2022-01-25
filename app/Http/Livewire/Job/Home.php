<?php

namespace App\Http\Livewire\Job;

use Livewire\Component;
use App\Models\Job;

class Home extends Component
{

    public $Jobs;
    public $JobsCollectingOffers;
    public $JobsInProgress;
    public $JobsFinished;
    public $JobsCompleted;

    public function mount() // mount se pokreće čim se komponenta učita
    {
        $this->Jobs = Job::all()->count();
        $this->JobsCollectingOffers = Job::where('status_id',1)->count();
        $this->JobsInProgress = Job::where('status_id',2)->count();
        $this->JobsFinished = Job::where('status_id',3)->count();
        $this->JobsCompleted = Job::where('status_id',4)->count();
    }

    public function render()
    {
        return view('livewire.job.home');
    }
}
