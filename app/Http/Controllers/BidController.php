<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;
use App\Models\Job;
use App\Models\User;
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
        //dd($job);
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

        $bidData += [
            'user_id'=>Auth::user()->id,
            'bidstatus_id'=>1,
        ];

        $newBid = Bid::create($bidData);



        toast()->success('Ponuda je uspešno kreirana')->push();
        return redirect(route('job.bids',$job));

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

        $bids = $user->bids()->latest()->paginate(3);
        //dd($bids);
        return view ('models.bid.user')
        ->with('bids',$bids);

    }

}
