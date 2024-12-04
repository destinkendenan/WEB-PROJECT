<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployerProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/welcome', 'welcome')->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/admin', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.index');

// Route::get('/employer/index', function () {
//     return view('employer.index');
// })->middleware(['auth', 'verified'])->name('employer.index');
// Route::get('/job_seeker/index', function () {
//     return view('job_seeker.index');
// })->middleware(['auth', 'verified'])->name('job_seeker.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::resource('admin', AdminController::class)->except(['show']);
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('employers', EmployerProfileController::class);
});

Route::get('/', [JobPostController::class, 'showJobCards'])->name('job_cards');
Route::get('/welcome', [JobPostController::class, 'showJobCards'])->name('welcome');
Route::get('/search', [JobPostController::class, 'search'])->name('job_posts.search');

Route::get('/job-applications', [JobApplicationController::class, 'index'])->name('job-applications.index');

require __DIR__.'/auth.php';
