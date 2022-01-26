<?php

namespace App\Http\Livewire\Bid;

use Livewire\Component;

class Dashboard extends Component
{


    public $myBids;
    public $createdBids;
    public $selectedBids;
    public $deliveredBids;
    public $completedBids;

    public function mount() // mount se pokreće čim se komponenta učita
    {
        $this->myBids = auth()->user()->bids->count();
        $this->createdBids = auth()->user()->bids->where('bidstatus_id',1)->count();
        $this->selectedBids = auth()->user()->bids->where('bidstatus_id',2)->count();
        $this->deliveredBids = auth()->user()->bids->where('bidstatus_id',3)->count();
        $this->completedBids = auth()->user()->bids->where('bidstatus_id',4)->count();

    }


    public function render()
    {
        return view('livewire.bid.dashboard');
    }
}
