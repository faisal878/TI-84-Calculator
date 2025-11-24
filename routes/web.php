<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('web.home'); })->name('home');
Route::get('/graphing-calculator', function () { return view('web.graphing-calculator'); })->name('graphing-calculator');

include_once __DIR__.'/ti-30xs-calculator.php';
include_once __DIR__.'/ti84calc.php';


Route::get('/about-us', function () { return view('web.about-us'); })->name('about');
Route::get('/blogs', function () { return view('web.blogs'); })->name('blogs');
Route::get('/contact-us', function () { return view('web.contact'); })->name('contact');
Route::get('/privacy-policy', function () { return view('web.privacy-policy'); })->name('privacy-policy');
Route::get('/terms-and-conditions', function () { return view('web.terms-and-conditions'); })->name('terms-and-conditions');
Route::get('/card', function () { return view('web.card-detail'); })->name('card.detail');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
