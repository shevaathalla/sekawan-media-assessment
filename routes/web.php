<?php

use App\Http\Controllers\ApprovementController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleOwnershipController;
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
    return redirect('dashboard');
});

//Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.showLogin');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('auth.logout');

//Dashboard
Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Vehicle
    Route::get('/vehicle', [VehicleController::class, 'index'])->name('vehicle.index');
    Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/vehicle/store', [VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('/vehicle/{id}', [VehicleController::class, 'show'])->name('vehicle.show');

    //Vehicle Ownership
    Route::get('/ownership', [VehicleOwnershipController::class, 'index'])->name('ownership.index');
    Route::get('/ownership/create', [VehicleOwnershipController::class, 'create'])->name('ownership.create');
    Route::post('/ownership/store', [VehicleOwnershipController::class, 'store'])->name('ownership.store');
    Route::get('/ownership/{id}', [VehicleOwnershipController::class, 'show'])->name('ownership.show');

    //Driver
    Route::get('/driver', [DriverController::class, 'index'])->name('driver.index');
    Route::get('/driver/create', [DriverController::class, 'create'])->name('driver.create');
    Route::post('/driver/store', [DriverController::class, 'store'])->name('driver.store');
    Route::get('/driver/{id}', [DriverController::class, 'show'])->name('driver.show');

    //Rental
    Route::get('/rental', [RentalController::class, 'index'])->name('rental.index');
    Route::get('/rental/create', [RentalController::class, 'create'])->name('rental.create');
    Route::post('/rental/store', [RentalController::class, 'store'])->name('rental.store');
    Route::get('/rental/{id}', [RentalController::class, 'show'])->name('rental.show');

    //Approval
    Route::group(['middleware' => 'branch.manager'], function () {
        Route::get('/branch-approvement', [ApprovementController::class, 'showBranchApproval'])->name('branch.showApprovement');
        Route::get('/rental/{id}/approve', [RentalController::class, 'approve'])->name('rental.approve');
        Route::get('/rental/{id}/reject', [RentalController::class, 'reject'])->name('rental.reject');
        Route::group(['middleware' => 'region.manager'], function () {
            Route::get('/region-approvement', [ApprovementController::class, 'showRegionApproval'])->name('region.showApprovement');
            Route::get('/rental/{id}/check', [ApprovementController::class, 'check'])->name('rental.approvement.check');
            Route::post('/rental/{id}/finish', [RentalController::class, 'finish'])->name('rental.finish');
        });
    });
});
