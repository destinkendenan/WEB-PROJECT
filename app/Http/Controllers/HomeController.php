<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil hanya job posts yang memiliki status 'active'
        $jobPosts = JobPost::where('status', 'active')->paginate(6);

        return view('welcome', compact('jobPosts'));
    }
}