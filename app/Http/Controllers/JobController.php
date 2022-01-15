<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Models\Skill;
use Auth;
use URL;

class JobController extends Controller
{
    public function index()
    {

        $joblist = Job::orderBy('updated_at','desc')->paginate(4);

        return view('models.job.index')
        ->with(['allJobs'=>$joblist]);
    }

    public function myjobs()
    {

        $myJobs = Job::where('user_id',Auth::user()->id)->latest()->paginate(5);

        return view('models.job.myjobs')
        ->with(['myJobs'=>$myJobs]);
    }


    public function show(Job $job)
    {
        return view('models.job.show')->with('job',$job);
    }

    public function destroy (Job $job)
    {
        $job->delete();
        toast()->success('Posao je obrisan')->push();
        return redirect(route('job.myjobs'));

    }

    public function create ()
    {
        $allCategories = Category::all();

        return view('models.job.create')
        ->with('allCategories',$allCategories);

    }

    public function store(Request $request)
    {


        $jobData = request()->validate([
            'description' => 'required',
            'reward' => 'required|numeric|gt:0',
            'days' => 'required|numeric|gt:0',
            'skill_id' => 'required',
        ]);

        $skill = Skill::where('id',$jobData['skill_id'])->first();

        unset($jobData['skill_id']); // nakon validacije ne treba nam skill_id jer skill mora da se dodeli preko attach() metode

        $jobData += [
            'user_id'=>Auth::user()->id,
            'status_id'=>1,
            'rating'=>0,
        ];

        //dd($jobData);

        $newJob = Job::create($jobData);

        $newJob->skills()->attach($skill);

        toast()->success('Uspešna objava posla')->push();
        return redirect(route('job.show',$newJob));

    }

    public function bids (Job $job)
    {
        if($job->bids->count() == 0)
        {
            toast()->danger('Izabrani posao još uvek nema ponuda')->push();
        }

        return view('models.job.bids')
        ->with('bids', $job->bids->sortBy('created_at'))
        ->with('job', $job);


    }
}
