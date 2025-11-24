<?php
use Illuminate\Support\Facades\Route;

Route::get('/ti-30xs-calculator', function () { return view('web.ti-30xs-calculator'); })->name('ti-30xs-calculator');
Route::get('/ti-30xs-calculator/start', function () { return view('web.TI-30XS-Calculator-start'); })->name('ti-30xs-calculator-start');

