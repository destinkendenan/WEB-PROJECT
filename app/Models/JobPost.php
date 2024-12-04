<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'title',
        'location',
        'job_type',
        'contact_email',
        'contact_phone',
        'description',
        'requirements',
        'salary',
        'status',
    ];

    public function employer()
    {
        return $this->belongsTo(EmployerProfile::class, 'employer_id');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'job_post_id');
    }
}
