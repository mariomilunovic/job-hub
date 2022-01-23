<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Models\Skill;
use App\Models\User;
use Auth;
use URL;

class JobController extends Controller
{
    public function index()
    {

        $joblist = Job::orderBy('updated_at','desc')->paginate(3);

        return view('models.job.index')
        ->with(['allJobs'=>$joblist]);
    }

    public function user(User $user)
    {
        $userJobs = Job::where('user_id',$user->id)->latest()->paginate(4);

        return view('models.job.user')
        ->with(['userJobs'=>$userJobs]);
    }

    public function skill(Skill $skill)
    {
        $jobs = $skill->jobs()->orderBy('updated_at','desc')->paginate();
        //dd($users);
        return view('models.job.skill')
        ->with('jobs',$jobs)
        ->with('skill',$skill);
    }


    public function show(Job $job)
    {
        return view('models.job.show')->with('job',$job);
    }

    public function destroy (Job $job)
    {
        $job->delete();
        toast()->success('Posao je obrisan')->push();
        return redirect(route('job.user',auth()->user()));

    }

    public function create ()
    {
        $allCategories = Category::all();

        return view('models.job.create')
        ->with('allCategories',$allCategories);


    }

    public function edit (Job $job)
    {
        $allCategories = Category::all();

        return view('models.job.edit')
        ->with('allCategories',$allCategories)
        ->with('job',$job);

    }

    public function update (Job $job)
    {
        request()->validate([
            'description' => 'required',
            'reward' => 'required|numeric|gt:0',
            'days' => 'required|numeric|gt:0',
            'skill_id' => 'required',
        ]);

        $job->description = request('description');
        $job->reward = request('reward');
        $job->days = request('days');

        $oldskill = Skill::where('id',$job->skill_id)->first();
        $job->skills()->detach($oldskill);

        $newskill = Skill::where('id',request('skill_id'))->first();
        $job->skills()->attach($newskill);

        $job->save();

        toast()->success('Uspešna izmena podataka o poslu')->push();
        return redirect(route('job.show',$job));

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
        return redirect(route('job.user',auth()->user()));

    }

    public function bids (Job $job)
    {
        $bids = $job->bids()->latest()->paginate(3);

        if($bids->count() == 0)
        {
            toast()->danger('Izabrani posao još uvek nema ponuda')->push();
        }

        return view('models.job.bids')
        ->with('bids', $bids)
        ->with('job', $job);

    }
}
