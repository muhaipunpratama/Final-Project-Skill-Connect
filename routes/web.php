<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobAplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\AdminController;

// Rute untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman home
Route::get('/home', [HomeController::class, 'home'])->name('homePage');

// Rute untuk pilihan peran
Route::get('/role-option', function () {
    return view('auth.roleOption');
})->name('roleOption');

// Rute untuk menangani pengiriman formulir pilihan peran
Route::get('/role-option/k', [RegisteredUserController::class, 'role'])->name('role');
Route::post('/role-option/k', [RegisteredUserController::class, 'role'])->name('role');

// Rute untuk dashboard, hanya dapat diakses oleh pengguna yang terautentikasi dan terverifikasi
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Rute yang dikelompokkan untuk pengguna yang terautentikasi
Route::middleware('auth')->group(function () {
    // Rute untuk manajemen profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk pencari kerja
Route::get('/jobs', [JobAplicationController::class, 'listJobs'])->name('jobseeker.job.list');
Route::get('/job/{id}', [JobAplicationController::class, 'jobDetails'])->name('jobseeker.job.details');
Route::post('/jobseeker/apply/{id}', [JobSeekerController::class, 'apply'])->name('jobseeker.apply');
Route::get('/job-seeker/applications', [JobAplicationController::class, 'listApplications'])->name('jobSeeker.applications');

// Rute untuk pemberi kerja
Route::get('/employer/job/{id}/applicants', [JobAplicationController::class, 'listApplicants'])->name('employer.aplication');
Route::get('/employer/jobPost/{id}/applicants', [JobPostController::class, 'listApplicants'])->name('employer.aplication');
Route::get('/employer/profile/{id}', [JobAplicationController::class, 'showJobSeekerProfile'])->name('employer.profile');
Route::post('/employer/accept-applicant/{id}', [JobAplicationController::class, 'acceptApplicant'])->name('employer.acceptApplicant');
Route::post('/employer/reject-applicant/{id}', [JobAplicationController::class, 'rejectApplicant'])->name('employer.rejectApplicant');

// Rute yang dikelompokkan untuk pemberi kerja
Route::middleware('employer')->group(function () {
    Route::resource('employer', EmployerController::class)
        ->names([
            'index' => 'employer.index',
            'create' => 'employer.create',
            'store' => 'employer.store',
            'edit' => 'employer.edit',
            'update' => 'employer.update', 
            'destroy' => 'employer.destroy',
        ]);
    Route::resource('jobPost', JobPostController::class)
        ->names([
            'index' => 'jobPost',
            'create' => 'jobPost.create',
            'store' => 'jobPost.store',
            'edit' => 'jobPost.edit',
            'update' => 'jobPost.update',
            'destroy' => 'jobPost.destroy',
            'show' => 'jobPost.show',
            'listApplicants' => 'employer.aplication',
        ]);
});

// Rute yang dikelompokkan untuk pencari kerja
// Route::middleware('job_seeker')->group(function () {
//     Route::resource('jobSeeker', JobSeekerController::class)
//         ->names([
//             'index' => 'jobSeeker.index',
//             'create' => 'jobSeeker.create',
//             'store' => 'jobSeeker.store',
//             'show' => 'jobSeeker.show',
//             'edit' => 'jobSeeker.edit',
//             'destroy' => 'jobSeeker.destroy',
//             // 'listJobs' => 'jobSeeker.job.list',
//             // 'jobDetails' => 'jobSeeker.job.details',
//         ]);
// });
Route::put('jobSeeker/update', [JobSeekerController::class, 'update'])->name('jobSeeker.update')->middleware('job_seeker');
Route::get('jobSeeker/index', [JobSeekerController::class, 'index'])->name('jobSeeker.index')->middleware('job_seeker');
Route::get('jobSeeker/create', [JobSeekerController::class, 'create'])->name('jobSeeker.create')->middleware('job_seeker');
Route::post('jobSeeker/store', [JobSeekerController::class, 'store'])->name('jobSeeker.store')->middleware('job_seeker');
Route::get('jobSeeker/show', [JobSeekerController::class, 'show'])->name('jobSeeker.show')->middleware('job_seeker');
Route::get('jobSeeker/edit', [JobSeekerController::class, 'edit'])->name('jobSeeker.edit')->middleware('job_seeker');
Route::delete('jobSeeker/destroy', [JobSeekerController::class, 'destroy'])->name('jobSeeker.destroy')->middleware('job_seeker');
Route::get('jobSeeker/listJobs', [JobSeekerController::class, 'listJobs'])->name('jobSeeker.job.list')->middleware('job_seeker');
Route::get('jobSeeker/jobDetails', [JobSeekerController::class, 'jobDetails'])->name('jobSeeker.job.details')->middleware('job_seeker');

// Route::get('jobSeeker/create', [JobSeekerController::class, 'create'])->name('jobSeeker.create')->middleware('job_seeker');

// Route::resource('jobSeeker', JobSeekerController::class)->middleware('job_seeker');



// Rute yang dikelompokkan untuk admin
Route::middleware('admin')->group(function () {
    Route::resource('admin', AdminController::class)
        ->names([
            'index' => 'admin.index',
            'create' => 'admin.create',
            'store' => 'admin.store',
            'show' => 'admin.show',
            'edit' => 'admin.edit',
            'update' => 'admin.update',
            'destroy' => 'admin.destroy',
        ]);
});

// Sertakan rute autentikasi
require __DIR__.'/auth.php';

