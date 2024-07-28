<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('store-department', [DepartmentController::class, 'storeDepartment']);
Route::get('get-departments', [DepartmentController::class, 'getDepartment']);
Route::post('update-department/{id}', [DepartmentController::class, 'updateDepartment']);
Route::post('delete-department/{id}', [DepartmentController::class, 'deleteDepartment']);
