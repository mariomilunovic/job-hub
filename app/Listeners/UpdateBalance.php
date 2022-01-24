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
        $transaction_type_id = $event->transaction->transactiontype->id;
        $amount = $event->transaction->amount;

        //dd($event->transaction->transactiontype);

        if($transaction_type_id  == 1) //uplata
        {
            $recipient->balance += $amount;
            $recipient->save();

            toast()->success('Uspešna uplata. Novo stanje'.' '.$recipient->balance)->push();
        }

        if($transaction_type_id  == 2) //isplata
        {
            $recipient->balance -= $amount;
            $recipient->save();

            toast()->success('Uspešna isplata. Novo stanje'.' '.$recipient->balance)->push();
        }

        if($transaction_type_id  == 3) //rezervacija
        {
            $payer->balance -= $amount;
            $payer->save();

            toast()->success('Ponuda je izabrana. Rezervisana su sredstva u vrednosti izabrane ponude. Raspoloživo stanje :'.' '.$payer->balance)->push();
        }

        if($transaction_type_id  == 4) //plata
        {
            $recipient->balance += $amount;
            $recipient->save();

            toast()->success('Radovi su prihvaćeni. Rezervisana su sredstva su prebačena ponuđaču. Raspoloživo stanje :'.' '.$payer->balance)->push();
        }


    }
}
