<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('dashboard', DashboardController::class, );
Route::resource('rombels', RombelController::class, );
Route::resource('rayons', RayonController::class, );
Route::resource('students', StudentController::class, );

Route::get('students-pdf', [StudentController::class, 'studentsPdf']);
Route::get('rombels-pdf', [RombelController::class, 'rombelsPdf']);
Route::get('rayons-pdf', [RayonController::class, 'rayonsPdf']);