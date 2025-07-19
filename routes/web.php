<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceHistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes Karyawan
Route::resource('employees', EmployeeController::class);

// Routes Departemen
Route::resource('departments', DepartmentController::class);

// Routes Absensi
Route::prefix('attendance')->name('attendance.')->group(function () {
    // Halaman utama absensi
    Route::get('/', [AttendanceController::class, 'index'])->name('index');
    
    // Check-in
    Route::get('/checkin', [AttendanceController::class, 'showCheckInForm'])->name('checkin.form');
    Route::post('/checkin', [AttendanceController::class, 'checkIn'])->name('checkin');
    
    // Check-out
    Route::get('/checkout', [AttendanceController::class, 'showCheckOutForm'])->name('checkout.form');
    Route::post('/checkout', [AttendanceController::class, 'checkOut'])->name('checkout');
    
    // Log absensi
    Route::get('/logs', [AttendanceController::class, 'logs'])->name('logs');

    // Ketepatan absensi
    Route::get('/ketepatan', [AttendanceController::class, 'ketepatanAbsensi'])->name('ketepatan');
});

// Route khusus untuk menampilkan view riwayat absensi
Route::get('attendance-history', [AttendanceHistoryController::class, 'index'])->name('attendance_history.index');

// API Autocomplete Karyawan
Route::get('/api/employees', [EmployeeController::class, 'getEmployees'])->name('api.employees');
