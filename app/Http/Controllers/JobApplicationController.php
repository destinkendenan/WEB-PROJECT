<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{

    public function index()
    {
        $jobApplications = JobApplication::with('jobPost')
        ->where('job_seeker_id', Auth::id())
        ->get();
        return view('job_seeker.applied_jobs.index', compact('jobApplications'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,rejected',
        ]);

        $jobApplication = JobApplication::findOrFail($id);
        $jobApplication->status = $request->status;
        $jobApplication->save();

        return redirect()->route('employer.applicants.index')->with('success', 'Job application status updated successfully.');
    }

    public function create($jobPostId)
    {           
        $jobPost = JobPost::findOrFail($jobPostId);
        return view('job_seeker.applied_jobs.create', compact('jobPost'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_post_id' => 'required|exists:job_posts,id',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $jobSeekerProfile = \App\Models\JobSeekerProfile::where('user_id', Auth::id())->firstOrFail();
    
        $jobApplication = new JobApplication();
        $jobApplication->job_post_id = $request->job_post_id;
        $jobApplication->job_seeker_id = $jobSeekerProfile->id;
        if ($request->hasFile('cv')) {
            $jobApplication->cv = $request->file('cv')->store('cvs', 'public');
        }
        $jobApplication->status = 'pending';
        $jobApplication->applied_at = now();
        $jobApplication->save();
    
        return redirect()->route('applied_jobs.show', $jobApplication->id)
                        ->with('success', 'Job application submitted successfully.');
    }

    public function show($id)
    {
        $jobApplication = JobApplication::with('jobPost')->findOrFail($id);
        return view('job_seeker.applied_jobs.show', compact('jobApplication'));
    }
}
