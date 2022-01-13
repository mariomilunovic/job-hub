<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;

class BidController extends Controller
{
    public function show (Bid $bid)
    {
        return view ('models.bid.show')
        ->with('bid',$bid)
        ->with('job',$bid->job);
    }
}
