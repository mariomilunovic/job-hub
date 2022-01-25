<?php

namespace App\Http\Livewire\Bid;

use Livewire\Component;
use App\Models\Bid;

class Home extends Component
{
    public $Bids;
    public $BidsCollectingOffers;
    public $BidsInProgress;
    public $BidsFinished;
    public $BidsCompleted;

    public function mount() // mount se pokreće čim se komponenta učita
    {
        $this->Bids = Bid::all()->count();
        $this->createdBids = Bid::where('bidstatus_id',1)->count();
        $this->selectedBids = Bid::where('bidstatus_id',2)->count();
        $this->deliveredBids = Bid::where('bidstatus_id',3)->count();
        $this->completedBids = Bid::where('bidstatus_id',4)->count();

    }
    public function render()
    {
        return view('livewire.bid.home');
    }
}
