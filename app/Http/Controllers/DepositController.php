<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TransactionCreated;
use Auth;
use App\Models\Transaction;

class DepositController extends Controller
{
    public function create()
    {
        $payment_methods = Auth::user()->paymentmethods()->get();

        return view('models.transaction.deposit')
        ->with('payment_methods',$payment_methods);
    }

    public function store()
    {
        $user = Auth::user();

        //data from input
        $depositData = request()->validate([
            'amount' => 'required|numeric|gt:0',
            'payment_method_id' => 'required',
        ]);

        //adding data for this use case
        $depositData += [
            'from_user_id'=>$user->id,
            'to_user_id'=>$user->id,
            'bank_account_id'=>null,
            'bid_id'=>null,
            'transaction_type_id'=>1,
        ];

        $transaction = Transaction::create($depositData);

        event(new TransactionCreated($transaction));

        return redirect(route('transaction.show',$transaction));

    }
}
