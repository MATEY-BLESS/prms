<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| custom account user route
|--------------------------------------------------------------------------
|
*/

Route::get('/dashboard', 'PublicPatientController@index')->middleware(['auth'])->name('dashboard.user');

Route::middleware(['auth'])->group(function () {
    // Account user profile
    Route::resource('/dashboard/user/profile', 'BackendAccountUserProfileController')->names([
        'index' => 'dashboard.user.profile.index',
        'show' => 'dashboard.user.profile.show',
        'edit' => 'dashboard.user.profile.edit',
        'update' => 'dashboard.user.profile.update',
        'destroy' => 'dashboard.user.profile.destroy',
    ]);


    // Blog Articles
    Route::resource('/dashboard/article', 'BackendUserArticleController')->names([
        'index' => 'dashboard.user.article.index',
        'create' => 'dashboard.user.article.create',
        'store' => 'dashboard.user.article.store',
        'edit' => 'dashboard.user.article.edit',
        'show' => 'dashboard.user.article.show',
        'update' => 'dashboard.user.article.update',
        'destroy' => 'dashboard.user.article.destroy',
    ]);

    // Appointment
    Route::get('/dashboard/patient/appointment', 'PublicPatientController@appointment_index')
    ->name('public.patient.appointment.index');

    Route::get('/dashboard/patient/appointment/create', 'PublicPatientController@appointment_create')
    ->name('public.patient.appointment.create');

    Route::post('/dashboard/patient/appointment', 'PublicPatientController@appointment_store')
    ->name('public.patient.appointment.store');

    // Prescriptions
    Route::resource('/dashboard/patient/prescription', 'PublicPrescriptionController')->names([
        'index' => 'dashboard.patient.prescription.index',
        'show' => 'dashboard.patient.prescription.show',
    ]);
});



require __DIR__.'/auth.php';
