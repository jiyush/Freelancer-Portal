<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

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
            'title' => $data['title'],
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
        $job->title = $data['title'];
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
        $jobs = Job::join('categories', 'jobs.category_id','=','categories.id')
                ->select('jobs.*','categories.name as category')
                ->get();
        return $jobs;
    }
}
