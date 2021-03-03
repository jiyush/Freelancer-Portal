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
     * get category by id
     */
    public function categories(){
        return $this->morphToMany(Category::class,'category_id');
    }

    /**
     * Get all job for listin
     */
    public function getAllJobs(){
        $jobs = Job::with('categories')->get();
        return $jobs;
    }
}
