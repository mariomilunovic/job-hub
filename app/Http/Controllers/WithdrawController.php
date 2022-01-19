<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Transaction;

class WithdrawController extends Controller
{
    public function create()
    {
        $bank_accounts = Auth::user()->bankaccounts()->get();

        return view('models.transaction.withdraw')
        ->with('bank_accounts',$bank_accounts);
    }

    public function store()
    {
        $user = Auth::user();

        //data from input
        $withdrawData = request()->validate([
            'amount' => 'required|numeric|gt:0',
            'bank_account_id' => 'required',
        ]);

        //adding data for this use case
        $withdrawData += [
            'from_user_id'=>$user->id,
            'to_user_id'=>$user->id,
            'payment_method_id'=>null,
            'bid_id'=>null,
            'transaction_type_id'=>2,
        ];

        //dd($depositData);

        $transaction = Transaction::create($withdrawData);


        toast()->success('Uspešna isplata')->push();
        return redirect(route('transaction.show',$transaction));

    }
}
