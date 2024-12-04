<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\EmployerProfileController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\JobSeekerProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\EmployerProfile;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
});


// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::resource('admin', AdminController::class)->except(['show']);
// });

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/admin/index_profile/employer', [EmployerProfileController::class, 'index'])->name('admin.index_profile_employer');
//     Route::get('/admin/index_profile/job_seeker', [JobSeekerProfileController::class, 'index'])->name('admin.index_profile_job_seeker');
//     Route::resource('employers', EmployerProfileController::class);
//     Route::resource('job_seekers', JobSeekerProfileController::class);
//     Route::resource('admin', AdminController::class)->except(['show']);
// });

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/index_profile/employer', [EmployerProfileController::class, 'index'])->name('admin.index_profile_employer');
    Route::get('/index_profile/job_seeker', [JobSeekerProfileController::class, 'index'])->name('admin.index_profile_job_seeker');


    Route::resource('employers', EmployerProfileController::class)->except(['show']);
    Route::resource('job_seekers', JobSeekerProfileController::class);
    Route::resource('admin', AdminController::class);

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/employers/{id}', [EmployerProfileController::class, 'show'])->name('employers.show');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/employers/store', [EmployerProfileController::class, 'store'])->name('employers.store');
    // Route::post('/job_seekers/store', [JobSeekerProfileController::class, 'store'])->name('job_seekers.store');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('job_posts', JobPostController::class);
    Route::resource('employers', EmployerProfileController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/job-seeker/create-profile', [JobSeekerProfileController::class, 'create'])->name('job_seekers.create_profile');
    Route::post('/job-seeker/store-profile', [JobSeekerProfileController::class, 'store'])->name('job_seekers.store_profile');
    Route::get('/job-seeker/edit-profile/{id}', [JobSeekerProfileController::class, 'edit'])->name('job_seekers.edit_profile');
    Route::put('/job-seeker/update-profile/{id}', [JobSeekerProfileController::class, 'update'])->name('job_seekers.update_profile');
    Route::get('/job-seeker/{id}', [JobSeekerProfileController::class, 'show'])->name('job_seekers.show');

});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('applied_jobs/create/{jobPostId}', [JobApplicationController::class, 'create'])->name('applied_jobs.create');
    Route::post('applied_jobs', [JobApplicationController::class, 'store'])->name('applied_jobs.store');
    Route::get('applied_jobs/{id}', [JobApplicationController::class, 'show'])->name('applied_jobs.show');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/employer/applicants', [EmployerProfileController::class, 'indexApplicants'])->name('employer.applicants.index');
    Route::post('/employer/applicants{id}/update-status', [JobApplicationController::class, 'updateStatus'])->name('employer.updateStatus');
});

// Route untuk admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/applicants', [EmployerProfileController::class, 'indexApplicants'])->name('admin.applicants.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/applied-jobs', [JobApplicationController::class, 'index'])->name('job_applications.index');
});


// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/employers/{id}', [EmployerProfileController::class, 'show'])->name('employers.show');
//     Route::get('/employers/{id}/edit', [EmployerProfileController::class, 'edit'])->name('employers.edit');
//     Route::put('/employers/{id}', [EmployerProfileController::class, 'update'])->name('employers.update');
// });
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/profile/create', function () {
//         return view('admin.create_profile');
//     })->name('profile.create');

//     Route::get('/employers/create', [EmployerProfileController::class, 'create'])->name('employers.create');
//     Route::post('/employers/store', [EmployerProfileController::class, 'store'])->name('employers.store');

//     Route::get('/job_seekers/create', [JobSeekerProfileController::class, 'create'])->name('job_seekers.create');
//     Route::post('/job_seekers/store', [JobSeekerProfileController::class, 'store'])->name('job_seekers.store');

//     Route::post('/profiles/store', function (Request $request) {
//         if ($request->input('role') === 'employer') {
//             return redirect()->route('employers.store');
//         } elseif ($request->input('role') === 'job_seeker') {
//             return redirect()->route('job_seekers.store');
//         }
//     })->name('admin.profiles.store');
// });