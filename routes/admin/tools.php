<?php

use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/tools', [ToolsController::class, 'index'])->name('admin.tools.index');
Route::get('/admin/tools/create', [ToolsController::class, 'create'])->name('admin.tools.create');

Route::get('/admin/tools/edit/{id}', [ToolsController::class, 'edit'])->name('admin.tools.edit');
Route::post('/admin/tools/update', [ToolsController::class, 'update'])->name('admin.tools.update');

Route::post('/admin/tools/store', [ToolsController::class, 'store'])->name('admin.tools.store');


