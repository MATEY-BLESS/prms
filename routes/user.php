<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| custom account user route
|--------------------------------------------------------------------------
|
*/

Route::get('/dashboard', function () {
    return view('accounts.index');
})->middleware(['auth', 'verified'])->name('dashboard.user');

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
});



require __DIR__.'/auth.php';
