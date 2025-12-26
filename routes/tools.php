<?php

use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\Route;

// Route::get('/tools', [ToolsController::class, 'tools'])->name('tools');
Route::get('{slug}', [ToolsController::class, 'toolsSingle'])->name('tool.single');
Route::get('{lang?}/{slug}', [ToolsController::class, 'toolsSingle'])->name('tool.single');

// Route::redirect('tools/online-graphing-calculator', 'online-graphing-calculator', 301);
// Route::get('/tools/online-graphing-calculator', function () {
//     return redirect('/online-graphing-calculator', 301); // Permanent Redirect
// });
// Route::get('/tools/ti-30xs-calculator-online', function () {
//     return redirect('/ti-30xs-calculator-online', 301); // Permanent Redirect
// });

// Route::get('/tools/online-graphing-calculator', function () {
//     return redirect('/online-graphing-calculator', 301); // Permanent Redirect
// });

// Route::get('/tools/ti-84-calculator', function () {
//     return redirect('/ti-84-calculator', 301); // Permanent Redirect
// });


