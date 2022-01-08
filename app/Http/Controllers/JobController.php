<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $allJobs = Job::orderBy('updated_at','desc')->paginate(4);

        return view('models.job.index')
        ->with(['allJobs'=>$allJobs]);
    }

    public function show(Job $job)
    {
        return view('models.job.show')->with('job',$job);
    }
}
