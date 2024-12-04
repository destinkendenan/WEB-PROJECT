<?php

namespace App\Http\Controllers;

use App\Models\EmployerProfile;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobPostController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jobPosts = DB::table('job_posts')
            ->join('employer_profiles', 'job_posts.employer_id', '=', 'employer_profiles.id')
            ->select('job_posts.*', 'employer_profiles.company_name as company_name')
            ->where('employer_profiles.user_id', $user->id)
            ->get();

        return view('employer.job_post.index_job_post', compact('jobPosts'));
    }

// JobPostController.php
    public function search(Request $request)
    {
        $query = $request->input('query');
        $jobPosts = JobPost::where('title', 'LIKE', "%{$query}%")->paginate(6);

        return view('welcome', compact('jobPosts'));
    }

    public function showJobCards()
    {
        $jobPosts = JobPost::with('employer')
            ->where('status', 'active')
            ->paginate(6);
        return view('welcome', compact('jobPosts'));
    }

    public function create()
    {
        $user = Auth::user();
        $employerProfiles = EmployerProfile::where('user_id', $user->id)->first();
        return view('employer.job_post.create_job_post', compact('employerProfiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'employer_id' => 'required|exists:employer_profiles,id',
            'contact_email' => 'nullable|string|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        JobPost::create([
            'title' => $request->title,
            'location' => $request->location,
            'job_type' => $request->job_type,
            'employer_id' => $request->employer_id,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'salary' => $request->salary,
            'status' => $request->status,
        ]);

        return redirect()->route('job_posts.index')->with('success', 'Job post created successfully.');
    }

    public function show($id)
    {
        $job = JobPost::with('employer')->findOrFail($id);

        return view('employer.job_post.show_job_post', compact('job'));
    }

    public function edit($id)
    {
        $jobPost = JobPost::findOrFail($id);
        $user = Auth::user();
        $employerProfiles = EmployerProfile::where('user_id', $user->id)->first();
        return view('employer.job_post.edit_job_post', compact('jobPost', 'employerProfiles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'employer_id' => 'required|exists:employer_profiles,id',
            'contact_email' => 'nullable|string|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'salary' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $jobPost = JobPost::findOrFail($id);
        $jobPost->update([
            'title' => $request->title,
            'location' => $request->location,
            'job_type' => $request->job_type,
            'employer_id' => $request->employer_id,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'salary' => $request->salary,
            'status' => $request->status,
        ]);

        return redirect()->route('job_posts.index')->with('success', 'Job post updated successfully.');
    }

    public function destroy($id)
    {
        $jobPost = JobPost::findOrFail($id);
        $jobPost->delete();

        return redirect()->route('job_posts.index')->with('success', 'Job post deleted successfully.');
    }
}