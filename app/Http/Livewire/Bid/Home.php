<?php

namespace App\Http\Livewire\Bid;

use Livewire\Component;
use App\Models\Bid;

class Home extends Component
{
    public $allBids;
    public $createdBids;
    public $selectedBids;
    public $deliveredBids;
    public $completedBids;

    public function mount() // mount se pokreće čim se komponenta učita
    {
        $this->allBids = Bid::all()->count();
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
