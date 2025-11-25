<?php

use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\Route;

Route::get('/tools', [ToolsController::class, 'tools'])->name('tools');
Route::get('{slug}', [ToolsController::class, 'toolsSingle'])->name('tool.single');
Route::get('{lang?}/{slug}', [ToolsController::class, 'toolsSingle'])->name('tool.single');

