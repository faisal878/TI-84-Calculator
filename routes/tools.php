<?php

use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/tools/online-graphing-calculator', '/online-graphing-calculator');
Route::permanentRedirect('/tools/ti-30xs-calculator-online', '/ti-30xs-calculator-online');
Route::permanentRedirect('/tools/ti-84-calculator', '/ti-84-calculator');

Route::get('{slug}', [ToolsController::class, 'toolsSingle'])->name('tool.single');
Route::get('{lang?}/{slug}', [ToolsController::class, 'toolsSingle'])->name('tool.single');

