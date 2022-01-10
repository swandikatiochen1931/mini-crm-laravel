<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    echo "test";
});

Route::get('/companies', [App\Http\Controllers\CompaniesController::class, 'index'])->name('companies');
Route::get('/companies/edit/{id}', [App\Http\Controllers\CompaniesController::class, 'edit'])->name('companies.edit');
Route::post('/companies/store', [App\Http\Controllers\CompaniesController::class, 'store'])->name('companies.store');
Route::post('/companies/update/{id}', [App\Http\Controllers\CompaniesController::class, 'update'])->name('companies.update');
Route::delete('/companies/destroy/{id}', [App\Http\Controllers\CompaniesController::class, 'destroy'])->name('companies.destroy');

Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees')->middleware('auth');

Route::get('/kirimemail', [App\Http\Controllers\MailController::class, 'index'])->name('mail');
Auth::routes();
