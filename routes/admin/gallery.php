<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
Route::post('/admin/gallery/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
Route::get('/admin/gallery/destroy/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');


