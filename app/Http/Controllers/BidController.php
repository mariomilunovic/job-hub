<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;
use App\Models\Job;
use App\Models\User;
use App\Models\Transaction;
use App\Events\TransactionCreated;
use Auth;

class BidController extends Controller
{
    public function show (Bid $bid)
    {
        return view ('models.bid.show')
        ->with('bid',$bid)
        ->with('job',$bid->job);
    }

    public function create (Job $job)
    {
        foreach($job->bids as $bid)
        {
            if($bid->user_id == auth()->id())
            {
                toast()->danger('Možete dati samo jednu ponudu za izabrani posao')->push();
            return redirect(route('job.bids',$job));
            }
        }
        return view ('models.bid.create')
        ->with('job',$job);
    }

    public function store(Request $request)
    {

        $bidData = request()->validate([
            'message' => 'required',
            'offer' => 'required|numeric|gt:0',
            'days' => 'required|numeric|gt:0',
            'job_id' => 'required',
        ]);

        $job = Job::where('id',$bidData['job_id'])->first();

        foreach($job->bids as $bid)
        {
            if($bid->user_id == auth()->id())
            {
                toast()->danger('Možete dati samo jednu ponudu za izabrani posao')->push();
            return redirect(route('job.bids',$job));
            }
        }


        // if($job->bids)

        $bidData += [
            'user_id'=>Auth::user()->id,
            'bidstatus_id'=>1,
        ];

        $newBid = Bid::create($bidData);



        toast()->success('Ponuda je uspešno kreirana')->push();
        return redirect(route('job.bids',$job));

    }
    public function edit (Bid $bid)
    {
        return view('models.bid.edit')
        ->with('bid',$bid)
        ->with('job',$bid->job->first());
    }

    public function update (Bid $bid)
    {
        request()->validate([
            'message' => 'required',
            'offer' => 'required|numeric|gt:0',
            'days' => 'required|numeric|gt:0',
        ]);

        $bid->message = request('message');
        $bid->offer = request('offer');
        $bid->days = request('days');

        $bid->save();

        toast()->success('Uspešna izmena ponude')->push();
        return redirect(route('bid.show',$bid));

    }

    public function index()
    {
        $bids=Bid::orderBy('updated_at','desc')->paginate(3);
        return view ('models.bid.index')
        ->with('bids',$bids);
    }

    public function destroy (Bid $bid)
    {
        $job = $bid->job;
        $bid->delete();
        toast()->success('Ponuda je obrisana')->push();
        return redirect(route('job.bids',$job));

    }

    public function user (User $user)
    {
        $bids =  $user->bids()->latest()->paginate(3);
        return view ('models.bid.user')
        ->with('bids',$bids);
    }

    public function sent (User $user)
    {
        $bids =  $user->bids()->latest()->paginate(3);
        return view ('models.bid.sent')
        ->with('bids',$bids);
    }

    public function recieved (User $user)
    {
        $jobs = $user->jobs()->latest()->paginate(3);

        //dd($jobs);
        return view ('models.bid.recieved')
        ->with('jobs',$jobs);
    }

    public function select (Bid $bid)
    {

        //check if job owner has enough money
        if($bid->job->user->balance < $bid->offer)
        {
            toast()->danger('Nemate dovoljno sredstava za ovu ponudu!')->push();
            return redirect(route('job.bids',$bid->job));
        }

        // create money reservation
        $reservationData = [
            'amount' => $bid->offer,
            'transaction_type_id'=>3,
            'bid_id'=>$bid->id,
            'from_user_id'=>$bid->job->user_id,
            'to_user_id'=>$bid->user_id,
            'payment_method_id' => null,
            'bank_account_id'=>null,

        ];
        $transaction = Transaction::create($reservationData);


        // fire an event
        event(new TransactionCreated($transaction));


        // update bid status
        $bid->selected_at = now();
        $bid->bidstatus_id = 2;
        $bid->save();

        // update job status
        $job = $bid->job;
        $job->status_id = 2;
        $job->bid_selected_at = now();
        $job->save();

        return redirect(route('job.bids',$job));

    }

    public function deliver (Bid $bid)
    {
        $bid->delievered_at = now();
        $bid->bidstatus_id = 3;
        $bid->save();

        $job = $bid->job;
        $job->status_id = 3;
        $job->work_recieved_at = now();
        $job->save();

        toast()->success('Radovi su isporučeni!')->push();
        return redirect(route('job.bids',$job));

    }

    public function accept (Bid $bid)
    {
        //get reservation
        $transaction = Transaction::where('bid_id',$bid->id)->first();

        //dd($transaction);

        //convert transaction
        $transaction->transaction_type_id = 4;
        $transaction->save();

        // fire an event
        event(new TransactionCreated($transaction));
        $bid->accepted_at = now();
        $bid->bidstatus_id = 4;
        $bid->save();

        // update job
        $job = $bid->job;
        $job->status_id = 4;
        $job->work_accepted_at = now();
        $job->save();

        // add skill point to bid owner
        foreach($job->skills as $skill)
        {
            $bid->user->addSkill($skill);
        }


        return redirect(route('job.bids',$job));

        // Query example
        // public function updateOrderedQuantity($quantity, $orderId, $productId, $attribute)
        // {
        //     $query = DB::table('order_product')
        //         ->where('order_id', $orderId)
        //         ->where('product_id', $productId)
        //         ->where('attribute', $attribute)
        //         ->update(['quantity' => $quantity]);
        // }

    }

}
