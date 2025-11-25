<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [UserController::class, 'showLoginForm'])->name('login');

Route::post('/admin/authentication', [UserController::class, 'authentication'])->name('authentication');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/admin/blog/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/blog/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin/blog/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/blog/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::get('/admin/blog/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/admin/blog/posts', [PostController::class, 'index'])->name('admin.blog.post');
    Route::get('/admin/blog/posts/craete', [PostController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blog/posts/store', [PostController::class, 'store'])->name('admin.blog.store');
    Route::post('/admin/blog/posts/update', [PostController::class, 'update'])->name('admin.blog.update');
    Route::get('/admin/blog/posts/edit/{id}', [PostController::class, 'edit'])->name('admin.blog.edit');
    Route::get('/admin/blog/posts/destroy/{id}', [PostController::class, 'destroy'])->name('admin.blog.destroy');

    Route::get('/admin/role',  [RoleController::class, 'index'])->name('role');
    Route::post('/admin/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('/admin/role/update', [RoleController::class, 'update'])->name('role.update');
    Route::get('/admin/role/assign/permissions/{id}', [RoleController::class, 'assignPermissions'])->name('assign.permissions');
    Route::get('/admin/role/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    // Route::get('/create/new/user', function () { return view('admin.management.create-new-user'); })->name('create-new-user');
    Route::get('/admin/create/new/user', [UserController::class, 'index'])->name('create-new-user');

    Route::post('/admin/create/new/user/register', [UserController::class, 'register'])->name('register');

    Route::get('/admin/assign/permissions', [RoleController::class, 'permissions'])->name('assign-permissions');
    Route::post('/admin/assign/permissions/sync', [RoleController::class, 'sync'])->name('role.sync');

    Route::get('/admin/user/management', [UserController::class, 'show'])->name('user-management');
    Route::get('/admin/edit/user/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::get('/adminuser/delete/user/{id}', [UserController::class, 'destroy'])->name('delete.user');

    Route::get('/admin/user/activity/logs/{id}', [UserController::class, 'activitLogs'])->name('activity.logs');
    Route::get('/admin/profile', function () {
        return view('admin.profile');
    })->name('profile');

    include('gallery.php');
    include('tools.php');
 

    Route::get('/admin/privacy-policy', [SettingController::class, 'privacy'])->name('admin.privacy.policy');
    Route::get('/admin/terms-and-conditions', [SettingController::class, 'terms'])->name('admin.terms.condition');
    Route::post('/admin/setting/store', [SettingController::class, 'updateSetting'])->name('admin.settings.store');

    Route::get('/admin/contact-us', [ContactController::class, 'index'])->name('admin.contact.us');

    Route::get('/admin/all/links/post', [CategoryController::class, 'allPostLink']);
});
