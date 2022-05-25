<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorTypeController;
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
Route::middleware('admin')->group(function () {
    Route::get('/admin-dashboard', [AdminViewController::class, 'index'])->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    //doctors CRUD
    Route::get('/doctors-list', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctors-list/create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctors-list/store', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctors-list/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctors-list/{doctor}/update', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctors-list/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');
    //doctors type CRUD
    Route::get('/doctor-types', [DoctorTypeController::class, 'index'])->name('doctor.type.index');
    Route::post('/doctor-types', [DoctorTypeController::class, 'store'])->name('doctor.type.store');
    Route::put('/doctor-types/{doctorType}/update', [DoctorTypeController::class, 'update'])->name('doctor.type.update');
    Route::delete('/doctor-types/{doctorType}/delete', [DoctorTypeController::class, 'destroy'])->name('doctor.type.destroy');
    //Appointments
    Route::get('/appointments-list/{id}', [AppointmentController::class, 'show'])->name('appointment.show');
    Route::put('/appointments-list/{appointment}', [AppointmentController::class, 'update'])->name('appointment.update');
    Route::delete('/appointments-list/{id}', [AppointmentController::class, 'destroy'])->name('appointment.delete');
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'getNextAvailableAppointment'])->name('dashboard');
});

require __DIR__ . '/auth.php';
