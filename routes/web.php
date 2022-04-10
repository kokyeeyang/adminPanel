<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CalendarEventController;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get("/viewAllCompanies", [CompanyController::class, 'index'])->name('viewAllCompanies');
    Route::get('/viewCompany/{id}',[CompanyController::class, 'view'])->name('viewCompany');
    Route::put("/viewCompany/update/{id}", [CompanyController::class, 'update']);
    Route::delete("company/delete/{id}", [CompanyController::class, 'delete'])->name('deleteCompany');
    Route::get("createNewCompany", [CompanyController::class, 'create'])->name('createNewCompany');
    Route::post("saveNewCompany", [CompanyController::class, 'save'])->name('saveNewCompany');

    Route::get("/viewAllEmployees", [EmployeeController::class, 'index'])->name('viewAllEmployees');
    Route::get('/viewEmployee/{id}',[EmployeeController::class, 'view'])->name('viewEmployee');
    Route::put("/viewEmployee/update/{id}", [EmployeeController::class, 'update']);
    Route::delete("employee/delete/{id}", [EmployeeController::class, 'delete'])->name('deleteEmployee');
    Route::get("createNewEmployee", [EmployeeController::class, 'create'])->name('createNewEmployee');
    Route::post("saveNewEmployee", [EmployeeController::class, 'save']);

    Route::get('/fullcalendareventmaster',[CalendarEventController::class, 'index'])->name('viewFullCalendar');
    Route::post('/fullcalendareventmaster/create',[CalendarEventController::class, 'create']);
    Route::post('/fullcalendareventmaster/update',[CalendarEventController::class, 'update']);
    Route::post('/fullcalendareventmaster/delete',[CalendarEventController::class, 'destroy']);
});

require __DIR__.'/auth.php';
