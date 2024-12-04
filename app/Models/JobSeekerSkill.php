<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_seeker_id',
        'name',
    ];

    public function jobSeekerProfile()
    {
        return $this->belongsTo(JobSeekerProfile::class);
    }
}
