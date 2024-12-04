<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerProfile;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EmployerProfileController extends Controller
{

    public function indexApplicants()
    {
        
        if (Auth::check() && Auth::user()->role === 'employer') {
            $employerId = Auth::id();
        $jobApplications = JobApplication::with(['jobSeeker', 'jobPost'])
            ->whereHas('jobPost', function ($query) use ($employerId) {
                $query->where('employer_id', $employerId);
            })
            ->get();
            return view('employer.applicant.index', compact('jobApplications'));
        }
        if (Auth::check() && Auth::user()->role === 'admin') {
            $jobApplications = JobApplication::with(['jobSeeker', 'jobPost'])->get();
            return view('admin.applicant.index', compact('jobApplications'));
        }
        
    }

    public function index()
    {
        $users = User::with('employerProfile')->where('role', 'employer')->get();
        return view('admin.profile.index_profile', compact('users'));
    }

    public function create()
    {
        return view('employer.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:15',
            'website' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'logo' => 'nullable|string|max:255',
        ]);

        $employerProfile = EmployerProfile::create([
            'user_id' => Auth::user()->id,
            'company_name' => $request->company_name,
            'company_description' => $request->company_description,
            'industry' => $request->industry,
            'website' => $request->website,
            'phone' => $request->phone,
            'address' => $request->address,
            'logo' => $request->logo,
        ]);

        return redirect()->route('employers.show', $employerProfile->user_id)->with('success', 'Employer profile created successfully.');
    }

    public function show($id)
    {
        $employerProfile = EmployerProfile::where('user_id', $id)->firstOrFail();
        $user = User::findOrFail($id);
        return view('employer.profile.show', compact('employerProfile', 'user'));
    }

    public function edit($id)
    {
        $employerProfile = EmployerProfile::where('user_id', $id)->firstOrFail();
        $user = User::findOrFail($id);
        return view('employer.profile.edit', compact('employerProfile', 'user'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:15',
            'website' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'logo' => 'nullable|string|max:255',
        ]);
        
        $employerProfile = EmployerProfile::where('user_id', $id)->firstOrFail();
        $employerProfile->update([
            'company_name' => $request->company_name,
            'company_description' => $request->company_description,
            'industry' => $request->industry,
            'website' => $request->website,
            'phone' => $request->phone,
            'address' => $request->address,
            'logo' => $request->logo,
        ]);

        return redirect()->route('employers.show', $employerProfile->user_id)->with('success', 'Employer profile updated successfully.');
    }

    public function destroy($id)
    {
        $employer = EmployerProfile::findOrFail($id);
        $employer->delete();

        return redirect()->route('employer.index')->with('success', 'Employer profile deleted successfully.');
    }
}