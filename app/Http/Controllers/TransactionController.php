<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bid;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function deposit()
    {
        return view('models.transaction.deposit');
    }

    public function withdraw()
    {
        return view('models.transaction.withdraw');

    }

    public function user()
    {
        return view('models.transaction.user');
    }

    public function index()
    {
        return view('models.transaction.index');
    }

    public function store()
    {

        return view('models.transaction.index');
    }
}
