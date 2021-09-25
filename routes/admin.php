<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RegisteredAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| custom admin route
|--------------------------------------------------------------------------
|
*/

Route::middleware(['guest:admin'])->group(function () {
    Route::view('/admin/login', 'admins.login')->name('admin.user.login');
    Route::post('/admin/login', [AuthController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function () {

    // Admin Dashboard
    Route::get('/dashboard/admin', function () {
        return view('dashboard.index');
    })->name('dashboard.admin');

    // Doctor Dashboard
    Route::get('/dashboard/doctor/home', function () {
        return view('dashboard.doctor-dashboard');
    })->name('dashboard.doctor');

    // Super Admin Access: Admin and APP owner access
    Route::middleware(['super.access'])->group(function () {
        Route::get('/dashboard/admins', [AuthController::class, 'index'])->name('dashboard.admin.index');
        Route::get('/dashboard/admins/create', [RegisteredAdminController::class, 'create'])->name('dashboard.admin.create');
        Route::post('dashboard/admins', [RegisteredAdminController::class, 'store'])->name('admin.register');
        Route::get('/dashboard/admins/edit/{id}', [RegisteredAdminController::class, 'edit'])->name('dashboard.admin.edit');

        // View Admin User's Profile
        Route::get('/dashboard/admins/profile/{id}', 'BackendAdminProfileController@show')->name('admin.profile.view');

        // Admin Roles
        Route::resource('/dashboard/admins/roles', 'BackendAdminRoleController')->names([
            'index' => 'dashboard.admin.role.index',
            'store' => 'dashboard.admin.role.store',
            'edit' => 'dashboard.admin.role.edit',
            'update' => 'dashboard.admin.role.update',
            'destroy' => 'dashboard.admin.role.destroy',
        ]);

        // User Accounts: supper admin access to perform necessary actions
        Route::resource('/dashboard/user-account', 'BackendUserAccountController')->names([
            'index' => 'dashboard.user-account.index',
            'create' => 'dashboard.user-account.create',
            'store' => 'dashboard.user-account.store',
            'show' => 'dashboard.user-account.show',
            'edit' => 'dashboard.user-account.edit',
            'update' => 'dashboard.user-account.update',
            'destroy' => 'dashboard.user-account.destroy',
        ]);

        // Categories
        Route::resource('/dashboard/category', 'BackendCategoriesController')->names([
            'index' => 'dashboard.category.index',
            'store' => 'dashboard.category.store',
            'edit' => 'dashboard.category.edit',
            'update' => 'dashboard.category.update',
            'destroy' => 'dashboard.category.destroy',
        ]);

        // departments
        Route::resource('/dashboard/departments', 'BackendDepartmentsController')->names([
            'index' => 'dashboard.departments.index',
            'create' => 'dashboard.departments.create',
            'show' => 'dashboard.departments.show',
            'store' => 'dashboard.departments.store',
            'edit' => 'dashboard.departments.edit',
            'destroy' => 'dashboard.departments.destroy',
        ]);

        // Tags
        Route::resource('/dashboard/tag', 'BackendTagsController')->names([
            'index' => 'dashboard.tag.index',
            'store' => 'dashboard.tag.store',
            'edit' => 'dashboard.tag.edit',
            'update' => 'dashboard.tag.update',
            'destroy' => 'dashboard.tag.destroy',
        ]);

        // Abouts: Standard Pages - About us, privacy policy, terms & condition etc.
        Route::resource('/dashboard/about', 'BackendAboutsController')->names([
            'index' => 'dashboard.about.index',
            'create' => 'dashboard.about.create',
            'store' => 'dashboard.about.store',
            'show' => 'dashboard.about.show',
            'edit' => 'dashboard.about.edit',
            'update' => 'dashboard.about.update',
            'destroy' => 'dashboard.about.destroy',
        ]);

        // Subscribers
        Route::resource('/dashboard/subscriber', 'BackendSubscriberController')->names([
            'index' => 'dashboard.subscriber.index',
            'create' => 'dashboard.subscriber.create',
            'store' => 'dashboard.subscriber.store',
            'destroy' => 'dashboard.subscriber.destroy',
        ]);

        // Campaigns: Newsletter
        Route::get('/dashboard/campaign', function(){
            return view('dashboard.campaign');
        })->name('dashboard.admin.campaign');

        // Newsletter
        Route::resource('/dashboard/campaign/newsletter', 'BackendNewsletterController')->names([
            'index' => 'dashboard.newsletter.index',
            'create' => 'dashboard.newsletter.create',
            'store' => 'dashboard.newsletter.store',
            'destroy' => 'dashboard.newsletter.destroy',
        ]);

        // Seasonal Message
        Route::resource('/dashboard/campaign/seasonal-message', 'BackendSeasonalMessageController')->names([
            'index' => 'dashboard.seasonal-message.index',
            'create' => 'dashboard.seasonal-message.create',
            'store' => 'dashboard.seasonal-message.store',
            'destroy' => 'dashboard.seasonal-message.destroy',
        ]);

        // Jobs in Queue
        Route::get('/dashboard/notification/jobs', 'BackendJobController@pending')->name('dashboard.jobs.pending');


        // doctors
        Route::resource('/dashboard/doctors', 'BackendDoctorsController')->names([
            'index' => 'dashboard.doctors.index',
            'create' => 'dashboard.doctors.create',
            'show' => 'dashboard.doctors.show',
            'store' => 'dashboard.doctors.store',
            'edit' => 'dashboard.doctors.edit',
            'destroy' => 'dashboard.doctors.destroy',
        ]);

        // Assign Patient to Doctor(s)
        Route::get('/dashboard/patients/assign/{id}', 'BackendPatientsController@assign_doctor')
            ->name('dashboard.patient.doctor.assign');

        Route::post('/dashboard/patients/assign', 'BackendPatientsController@assign')
            ->name('dashboard.doctor.assign');

        // patients
        Route::resource('/dashboard/patients', 'BackendPatientsController')->names([
            'index' => 'dashboard.patients.index',
            'create' => 'dashboard.patients.create',
            'show' => 'dashboard.patients.show',
            'store' => 'dashboard.patients.store',
            'edit' => 'dashboard.patients.edit',
            'destroy' => 'dashboard.patients.destroy',
        ]);

        // appointments
        Route::resource('/dashboard/appointments', 'BackendAppointmentsController')->names([
            'index' => 'dashboard.appointments.index',
            'create' => 'dashboard.appointments.create',
            'show' => 'dashboard.appointments.show',
            'store' => 'dashboard.appointments.store',
            'edit' => 'dashboard.appointments.edit',
            'destroy' => 'dashboard.appointments.destroy',
        ]);

        Route::post('/dashboard/appointments/{id}', 'BackendAppointmentsController@assign')
        ->name('dashboard.appointments.doctor.assign');


    });


    Route::post('/admin/logout', [AuthController::class, 'destroy'])->name('admin.logout');

    // Admin User Profiles
    Route::get('/dashboard/admins/profile', 'BackendAdminProfileController@index')
    ->name('dashboard.admin.profile');

    // Blog Articles
    Route::resource('/dashboard/blog', 'BackendBlogController')->names([
        'index' => 'dashboard.blog.index',
        'create' => 'dashboard.blog.create',
        'store' => 'dashboard.blog.store',
        'edit' => 'dashboard.blog.edit',
        'show' => 'dashboard.blog.show',
        'update' => 'dashboard.blog.update',
        'destroy' => 'dashboard.blog.destroy',
    ]);

    // Doctor's Access
    Route::get('/dashboard/doctor/patients', 'BackendDoctorsController@patients')
            ->name('dashboard.doctors.patients.list');

});


require __DIR__.'/auth.php';
