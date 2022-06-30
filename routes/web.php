<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\DashboardController;
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
Route::get('/login', [AuthController::class,'showLogin'])->name('auth.showLogin');
Route::get('/register',[AuthController::class,'showRegister'])->name('auth.showRegister'); 
Route::post('/register',[AuthController::class,'register'])->name('auth.register');
Route::post('/login',[AuthController::class,'login'])->name('auth.login');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('auth.logout');

//Dashboard
Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    //Vehicle
    Route::get('/vehicle', [VehicleController::class,'index'])->name('vehicle.index');
    Route::get('/vehicle/create', [VehicleController::class,'create'])->name('vehicle.create');
    Route::post('/vehicle/store', [VehicleController::class,'store'])->name('vehicle.store');
    Route::get('/vehicle/{id}', [VehicleController::class,'show'])->name('vehicle.show');    

    //Vehicle Ownership
    Route::get('/ownership', [VehicleOwnershipController::class,'index'])->name('ownership.index');
    Route::get('/ownership/create', [VehicleOwnershipController::class,'create'])->name('ownership.create');
    Route::post('/ownership/store', [VehicleOwnershipController::class,'store'])->name('ownership.store');
    Route::get('/ownership/{id}', [VehicleOwnershipController::class,'show'])->name('ownership.show');    
});