<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;

class Dashboard extends Component
{
    public $balance;
    public $totalDeposit;
    public $totalWithdraw;
    public $reserved;
    public $totalSalary;
    public $totalExpenses;

    public function mount() // mount se pokreće čim se komponenta učita
    {
        $this->balance = auth()->user()->balance;
        $this->totalDeposit = auth()->user()->transactions->where('transaction_type_id',1)->sum('amount');
        $this->totalWithdraw = auth()->user()->transactions->where('transaction_type_id',2)->sum('amount');
        $this->reserved = auth()->user()->transactions->where('transaction_type_id',3)->sum('amount');
        $this->totalSalary = auth()->user()->transactions
        ->where('transaction_type_id',4)
        ->where('to_user_id',auth()->id())
        ->sum('amount');
        $this->totalExpenses = auth()->user()->transactions
        ->where('transaction_type_id',4)
        ->where('from_user_id',auth()->id())
        ->sum('amount');
    }

    public function render()
    {
        return view('livewire.transaction.dashboard');
    }
}
