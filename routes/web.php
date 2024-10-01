<?php

use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\HomeController as GuestHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [GuestHomeController::class, 'index'])->name('home');
Route::get('/home', [GuestHomeController::class, 'index'])->name('home');


// Route service

Route::middleware('auth')->name('admin.')->prefix('admin/')->group(
    function(){
            Route::get('service/delete', [AdminServiceController::class, 'deletedIndex'])->name('service.deleteindex');
            Route::patch('service/{service}/restore', [AdminServiceController::class, 'restore'])->name('service.restore');
            Route::delete('service/{service}/delete', [AdminServiceController::class, 'delete'])->name('service.permanent_delete');
            Route::resource('/service', AdminServiceController::class);
        }
    );

// Route appointment

Route::prefix('admin')->group(function () {
    Route::resource('appointment', AdminAppointmentController::class);
});
