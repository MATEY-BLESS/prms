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

    // Admin homepage
    Route::get('/dashboard/admin', function () {
        return view('dashboard.index');
    })->name('dashboard.admin');

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

});


require __DIR__.'/auth.php';
