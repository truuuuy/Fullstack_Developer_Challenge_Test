<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Routes ini digunakan untuk endpoint API berbasis Laravel.
| Dapat diakses melalui route seperti: http://localhost:8000/api/departments
|
*/

// Jika pakai Sanctum Auth:
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route API untuk Departemen
Route::apiResource('departments', DepartmentController::class);

// Route API untuk Employee (jika sudah dibuat)
Route::apiResource('employees', EmployeeController::class);
