<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/blog', [WebController::class, 'blog'])->name('home.blog');
Route::get('/blog/{slug}', [WebController::class, 'singleCategory'])->name('blog.post.category');
Route::get('/blog/{slug}', [WebController::class, 'singleArticle'])->name('blog.post.content');