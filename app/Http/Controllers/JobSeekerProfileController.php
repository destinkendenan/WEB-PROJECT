<?php

namespace App\Http\Controllers;

use App\Models\JobSeekerProfile;
use App\Models\JobSeekerSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobSeekerProfileController extends Controller
{
    public function create()
    {
        return view('job_seeker.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:15',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:255',
            'cv' => 'nullable|file|mimes:pdf|max:2048',
            'skills' => 'nullable|array',
            'skills.*' => 'string|max:255',
        ]);

        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $jobSeekerProfile = new JobSeekerProfile([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'profile_picture' => $profilePicturePath,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'bio' => $request->bio,
        ]);

        if ($request->hasFile('cv')) {
            if ($jobSeekerProfile->cv) {
                Storage::disk('public')->delete($jobSeekerProfile->cv);
            }

            $cvPath = $request->file('cv')->store('cvs', 'public');
            $jobSeekerProfile->cv = $cvPath;
        }

        $jobSeekerProfile->save();

        if ($request->skills) {
            foreach ($request->skills as $skill) {
                JobSeekerSkill::create([
                    'job_seeker_id' => $jobSeekerProfile->id,
                    'name' => trim($skill),
                ]);
            }
        }

        return redirect()->route('job_seekers.show', $jobSeekerProfile->id)->with('success', 'Job Seeker profile created successfully.');
    }

    public function show($id)
    {
        $profile = JobSeekerProfile::with('skills')->findOrFail($id);
        return view('job_seeker.profile.show', compact('profile'));
    }

    public function edit($id)
    {
        $jobSeekerProfile = JobSeekerProfile::with('skills')->findOrFail($id);
        return view('job_seeker.profile.edit', compact('jobSeekerProfile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:15',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:255',
            'cv' => 'nullable|file|mimes:pdf|max:2048',
            'skills' => 'nullable|array',
            'skills.*' => 'string|max:255',
        ]);

        $jobSeekerProfile = JobSeekerProfile::findOrFail($id);

        if ($request->hasFile('cv')) {
            if ($jobSeekerProfile->cv) {
                Storage::disk('public')->delete($jobSeekerProfile->cv);
            }

            $cvPath = $request->file('cv')->store('cvs', 'public');
            $jobSeekerProfile->cv = $cvPath;
        }

        $jobSeekerProfile->update([
            'full_name' => $request->full_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'bio' => $request->bio,
        ]);

        JobSeekerSkill::where('job_seeker_id', $jobSeekerProfile->id)->delete();

        if ($request->skills) {
            foreach ($request->skills as $skill) {
                JobSeekerSkill::create([
                    'job_seeker_id' => $jobSeekerProfile->id,
                    'name' => trim($skill),
                ]);
            }
        }

        return redirect()->route('job_seekers.show', $jobSeekerProfile->id)->with('success', 'Job Seeker profile updated successfully.');
    }

    public function destroy($id)
    {
        $jobSeekerProfile = JobSeekerProfile::findOrFail($id);
        $jobSeekerProfile->delete();

        return redirect()->route('job_seeker.index')->with('success', 'Job Seeker profile deleted successfully.');
    }
}
