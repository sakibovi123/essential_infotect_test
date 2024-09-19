<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\complain\ComplainController;


Route::get('/', function () {
    return view('layouts.app');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::get('/admin/complaints', [ComplainController::class, 'viewAllComplaints'])
        ->name('admin.complaints');
    Route::post('/complaint/update/{id}/{status}', [ComplainController::class, 'updateComplaintStatus'])->name('complaint.update');
    Route::get('/admin/patients', [AdminController::class, 'showPatients'])
        ->name('admin.patients');
    Route::get('/admin/approved-patients', [AdminController::class, 'showApprovedPatients'])
        ->name('admin.approved_patients'); // Approved patients
    Route::post('/admin/patient/approve/{id}', [AdminController::class, 'approvePatient'])->name('admin.patient.approve');
    Route::post('/admin/patient/reject/{id}', [AdminController::class, 'rejectPatient'])->name('admin.patient.reject');

    // Patient routes
    Route::get('/patient/complaints', [ComplainController::class, 'viewMyComplaints'])
        ->name('patient.complaints');
    Route::post('/complaint/submit', [ComplainController::class, 'submitComplaint'])->name('complaint.submit');

});

require __DIR__.'/auth.php';
