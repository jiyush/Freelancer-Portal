<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Auth;

class JobController extends Controller
{
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Show list of jobs
     */
    public function index(){
        // get all the jobs
        $jobs = $this->job->getAllJobs();
        return view('provider.index')->with('jobs',$jobs);
    }

    /**
     * show Add job form
     */
    public function addJob(Request $request){
        return view('provider.addJob');
    }

    /**
     * Add new job by provider
     */
    public function saveJob(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category_id' => ['required'],
            'startdate' => ['required','date'],
            'enddate' => ['required','date'],
        ]);
        $data = $request->all();
        $job = $this->job->addJob($data);
        if($job){
            return redirect(route('job'));
        }
    }

    /**
     * show edit job form
     *
     * @param Request $request
     */
    public function editJob(Request $request){
        $job = Job::whereId($request->id)->first();
        return view('provider.editJob')->with('job',$job);
    }

    /**
     * Update job
     */
    public function updateJob(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category_id' => ['required'],
            'startdate' => ['required','date'],
            'enddate' => ['required','date'],
        ]);
        $data = $request->all();
        $job = $this->job->updateJob($data);
        if($job){
            return redirect(route('job'));
        }
    }

    /**
     * Delete job
     *
     * @param $id
     */
    public function delete(Request $request){
        $this->job->deleteJob($request->id);
        return redirect(route('job'));
    }


}
