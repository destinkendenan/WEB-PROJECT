<?php

namespace App\Http\Controllers;

use App\Models\EmployerProfile;
use App\Models\JobApplication;
use App\Models\JobPost;
use App\Models\JobSeekerProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter filter dari request
        $role = $request->input('role');

        // Query pengguna, selalu mengecualikan admin
        $users = User::where('role', '!=', 'admin') // Kecualikan role admin
            ->when($role, function ($query, $role) {
                return $query->where('role', $role);
            })
            ->get();
        if (Auth::user()->role === 'admin') {
            return view('admin.user.index_user', compact('users'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function dashboard()
    {
        $employerCount = User::whereIn('role', ['employer'])->count();
        $jobSeekerCount = User::whereIn('role', ['job_seeker'])->count();
        $applicantCount = JobApplication::count();
        $jobPostCount = JobPost::where('employer_id', Auth::id())->count();

        if (Auth::user()->role === 'admin' || Auth::user()->role === 'employer' || Auth::user()->role === 'job_seeker') {
        return view('dashboard', compact('employerCount', 'jobSeekerCount', 'applicantCount', 'jobPostCount'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function create()
    {
        return view('admin.user.create_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,employer,job_seeker',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Periksa role pengguna dan tampilkan view yang sesuai
        if ($user->role === 'employer') {
            $employerProfile = EmployerProfile::where('user_id', $id)->firstOrFail();
            return view('admin.user.showEmployer', compact('user', 'employerProfile'));
        } elseif ($user->role === 'job_seeker') {
            $jobSeekerProfile = JobSeekerProfile::where('user_id', $id)->firstOrFail();
            return view('admin.user.showJobSeeker', compact('jobSeekerProfile', 'user'));
        }

        // Jika role tidak cocok, Anda bisa mengarahkan ke halaman error atau pesan notifikasi
        abort(404, 'Profile not found.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:admin,employer,job_seeker',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->username;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'User deleted successfully.');
    }
}