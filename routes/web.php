<?php
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

Route::middleware('auth')->name('admin.')->prefix('admin/')->group(
    function(){
        // Route::get('project/delete', [AdminProjectController::class, 'deletedIndex'])->name('project.deleteindex');
        // Route::patch('project/{project}/restore', [AdminProjectController::class, 'restore'])->name('project.restore');
        // Route::delete('project/{project}/delete', [AdminProjectController::class, 'delete'])->name('project.permanent_delete');
            Route::resource('/service', AdminServiceController::class);
        }
    );
