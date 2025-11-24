<?php
use Illuminate\Support\Facades\Route;

Route::get('/ti84calc', function () { return view('web.ti84calc.ti84calc'); })->name('ti84calc-calculator');
Route::get('/ti84calc/start', function () { return view('web.ti84calc.ti84calc-start'); })->name('ti84calc-calculator-start');