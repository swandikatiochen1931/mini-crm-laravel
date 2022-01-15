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
Route::get('/employees/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');
Route::post('/employees/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
Route::post('/employees/update/{id}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/destroy/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.destroy');

Route::get('/kirimemail/{company_id}', [App\Http\Controllers\MailController::class, 'index'])->name('mail');
Route::get('/send-mail', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
});
Auth::routes();
