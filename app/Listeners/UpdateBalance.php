<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use app\Events\TransactionCreated;

class UpdateBalance
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(TransactionCreated $event)
    {
        $payer = $event->transaction->from_user;
        $recipient = $event->transaction->to_user;
        $transaction_type = $event->transaction->transactiontype->name;
        $amount = $event->transaction->amount;

        //dd($event->transaction->transactiontype);

        if($transaction_type  == "uplata")
        {
            $recipient->balance += $amount;
            $recipient->save();

            toast()->success('Uspešna uplata. Novo stanje'.' '.$recipient->balance)->push();
        }

        if($transaction_type  == "isplata")
        {
            $recipient->balance -= $amount;
            $recipient->save();

            toast()->success('Uspešna isplata. Novo stanje'.' '.$recipient->balance)->push();
        }


    }
}