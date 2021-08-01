<?php

use Illuminate\Support\Facades\Route;

Use App\Http\Controllers\CategoryController;
Use App\Http\Controllers\DepartmentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('categories', [CategoryController::class, 'index']);
// Route::get('categories/{id}', [CategoryController::class, 'getCategory'])->name('categories');
Route::get('/', [DepartmentsController::class, 'index']); // localhost:8000/
Route::get('/getEmployees/{id}', [DepartmentsController::class, 'getEmployees']);
