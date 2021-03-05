<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Bid;

class FreelancerController extends Controller
{
    public function __construct(Job $job,Bid $bid)
    {
        $this->job = $job;
        $this->bid = $bid;
    }
    // show job post to bid
    public function index(){
        $jobs = $this->job->getNotBidedJobs();
        return view('freelancer.index')->with('jobs', $jobs);
    }

    /**
     * bid job by freelancer
     *
     * @param Request $request
     */
    public function bid(Request $request){
        $request->validate([
            'amount' => ['required', 'numeric'],
            'job_id' => ['required'],
            'user_id' => ['required'],
        ]);
        $data = $request->all();
        $bid = $this->bid->addBid($data);
        if($bid){
            return redirect(route('freelancer'));
        }else{
            return Redirect::back()->withErrors(['msg', 'Bid is not added!']);
        }
    }
    /**
     * get appruved job for freelancer
     */
    public function myJobs(){
        $jobs = $this->job->getAcceptedJobs();
        return view('freelancer.myJobs')->with('jobs', $jobs);
    }

}
