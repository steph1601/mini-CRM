<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;

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



// Route::get('/welcome', function () {
//     return view('sample');
// });


Auth::routes();

Route::group(['middleware' => ['admin']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/companies', [CompaniesController::class, 'index'])->name('companies');
Route::get('/companies/getData', [CompaniesController::class, 'getData'])->name('companies.getData');
Route::get('/companies/{companies}', [CompaniesController::class, 'show'])->name('companies.show');
Route::post('/companies/linkChecker', [CompaniesController::class, 'checkUrl'])->name('companies.linkChecker');
Route::post('/companies/store', [CompaniesController::class, 'store'])->name('companies.store');

Route::get('/companies/{companies}/edit', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::put('/companies/update', [CompaniesController::class, 'update'])->name('companies.update');

Route::post('/companies/{id}/soft-delete', [CompaniesController::class, 'softDelete'])->name('companies.softDelete');
Route::delete('/companies/{id}/delete', [CompaniesController::class, 'destroy'])->name('companies.destroy');


Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');
Route::get('/employees/{employees}', [EmployeesController::class, 'show'])->name('employees.show');

});



