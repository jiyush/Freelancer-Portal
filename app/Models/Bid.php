<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Bid extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_id',
        'user_id',
        'amount',
    ];

    /**
     * Add job bid
     */
    public function addBid(array $data){
        $bid = Bid::create([
            'job_id' => $data['job_id'],
            'user_id' => $data['user_id'],
            'amount' => $data['amount'],
        ]);
        $job = Job::whereId($bid->job_id)->firstOrFail();
        $job->bid_status = 0;
        $job->save();
        return $bid;
    }

}
