<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bid;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use Auth;

class TransactionController extends Controller
{



    public function user(User $user)
    {
        // $myTransactions = $user->transactions()->latest()->paginate(3);
        $myTransactions = Transaction::where('from_user_id','=',$user->id)
        ->orwhere('to_user_id','=',$user->id)->latest()->paginate(67);
        return view('models.transaction.user')
        ->with('myTransactions',$myTransactions);
    }

    public function index()
    {
        $allTransactions = Transaction::latest()->paginate(7);
        return view('models.transaction.index')
        ->with('allTransactions',$allTransactions);
    }

    public function show(Transaction $transaction)
    {
        //dd($transaction);
        return view('models.transaction.show')
        ->with('transaction',$transaction);
    }






}
