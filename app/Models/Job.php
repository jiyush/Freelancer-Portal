<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\Bid;

class Job extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
        'bid_id',
        'bid_status',
        'startdate',
        'enddate',
    ];

    /**
     * Add new job
     */
    public function addJob(array $data){
        $job =  Job::create([
            'title' =>  ucwords($data['title']),
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'user_id' => Auth::user()->id,
            'startdate' => $data['startdate'],
            'enddate' => $data['enddate'],
        ]);
        return $job;
    }

    /**
     * update existing job
     */
    public function updateJob(array $data){
        $job = Job::whereId($data['id'])->firstOrFail();
        $job->title = ucwords($data['title']);
        $job->description = $data['description'];
        $job->category_id = $data['category_id'];
        $job->user_id = Auth::user()->id;
        $job->startdate = $data['startdate'];
        $job->enddate = $data['enddate'];
        $job->save();
        return $job;
    }

    /**
     * Delete job
     *
     * @param $id
     */
    public function deleteJob($id){
        $bid = Bid::where('job_id','=',$id)->delete();
        $job = Job::whereId($id)->delete();
    }

    /**
     * get category by id
     */
    public function categories(){
        return $this->morphToMany(Category::class,'category_id');
    }

    /**
     * Get all job for listin
     */
    public function getAllJobs(){
        if(Auth::user()->role == 'admin'){
            $jobs = Job::join('categories', 'jobs.category_id','=','categories.id')
                ->select('jobs.*','categories.name as category')
                ->orderBy('jobs.title')
                ->get();
        }else{
            $jobs = Job::join('categories', 'jobs.category_id','=','categories.id')
                ->where('user_id',Auth::user()->id)
                ->select('jobs.*','categories.name as category')
                ->orderBy('jobs.title')
                ->get();
        }

        return $jobs;
    }

    /**
     * get bided jobs
     */
    public function getBidedJobs(){
        $jobs = Job::join('categories', 'jobs.category_id','=','categories.id')
                ->join('bids', 'jobs.id','=','bids.job_id')
                ->where('bid_status', 1)
                ->where('jobs.user_id',Auth::user()->id)
                ->select('jobs.*','categories.name as category','bids.amount', 'bids.id as bidId')
                ->orderBy('jobs.title')
                ->get();
        return $jobs;
    }

    /**
     * get not bided jobs
     */
    public function getNotBidedJobs(){
        $jobs = Job::join('categories', 'jobs.category_id','=','categories.id')
                ->select('jobs.*','categories.name as category')
                ->where('bid_status', 0)
                ->orderBy('jobs.title')
                ->get();
        return $jobs;
    }

    /**
     * Accept bid
     */
    public function acceptBid(array $data){
        $job = Job::whereId($data['job_id'])->firstOrFail();
        $job->bid_id = $data['bid_id'];
        $job->save();
        return $job;
    }

    /**
     * Cancle bid
     */
    public function cancleBid(array $data){
        $job = Job::whereId($data['job_id'])->firstOrFail();
        $job->bid_status = 0;
        $job->save();
        $bid = Bid::whereId($data['bid_id'])->delete();
        return $job;
    }

    /**
     * get accepted jobs for freelancer
     */
    public function getAcceptedJobs(){
        $userid = Auth::user()->id;
        $jobs = Job::join('categories', 'jobs.category_id','=','categories.id')
                ->join('bids', 'jobs.id','=','bids.job_id')
                ->where('bid_status', 1)
                ->where('bid_id','!=',null)
                ->where('bids.user_id',$userid)
                ->select('jobs.*','categories.name as category','bids.amount', 'bids.id as bidId')
                ->orderBy('jobs.title')
                ->get();
        return $jobs;
    }
}
