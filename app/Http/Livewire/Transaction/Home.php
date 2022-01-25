<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\User;

class Home extends Component
{

    public $balance;
    public $totalDeposit;
    public $totalWithdraw;
    public $reserved;
    public $totalSalary;
    public $totalExpenses;

    public function mount() // mount se pokreće čim se komponenta učita
    {
        $this->balance = User::all()->sum('balance');
        $this->totalDeposit = Transaction::where('transaction_type_id',1)->sum('amount');
        $this->totalWithdraw = Transaction::where('transaction_type_id',2)->sum('amount');
        $this->reserved = Transaction::where('transaction_type_id',3)->sum('amount');
      
    }
    public function render()
    {
        return view('livewire.transaction.home');
    }
}
