<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PresenceController;

Route::middleware(['guest:employee'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('employee.login');

    Route::post('/process-login', [AuthController::class, 'processLogin'])->name('process-login');
});

Route::prefix('employee')->middleware(['auth:employee'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('employee.dashboard.index');

    Route::get('/presensi/create', [PresenceController::class, 'create'])->name('presensi-create');

    Route::get('/process-logout', [AuthController::class, 'processLogout'])->name('logout.employee');
});
