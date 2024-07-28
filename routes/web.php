<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'dashboard']);
Route::get('department/index', [DepartmentController::class, 'index'])->name('department.index');
Route::get('department/create', [DepartmentController::class, 'create'])->name('department.create');
Route::post('department/store', [DepartmentController::class, 'store'])->name('department.store');
Route::get('department/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
Route::post('department/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
Route::post('department/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');

Route::get('users/index', [UserController::class, 'index'])->name('user.index');