<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () { return view('web.home'); })->name('home');
Route::get('/', [WebController::class, 'home'])->name('home');

Route::get('/contact-us', [WebController::class, 'contact'])->name('contact');
Route::get('/about-us', [WebController::class, 'about_us'])->name('about-us');

Route::get('/privacy-policy', [WebController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [WebController::class, 'terms_and_conditions'])->name('terms-and-conditions');

Route::post('/send/email', [ContactController::class, 'store'])->name('contact.sendEmail');


Route::get('/sitemap.xml', function () {
    $posts = \App\Models\Post::orderBy('id', 'desc')->where('is_published', 1)->get();
    $tools = \App\Models\Tool::with('parentTool','childTools')->where('home', '0')->where('index', 1)->whereNull('tool_id')->orderBy('id', 'desc')->where('status', 1)->get();
    return response()->view('sitemap.xml', compact('posts', 'tools'))->header('Content-Type', 'application/xml');
});

include('blog.php');
include('admin/admin.php');
include('tools.php');
