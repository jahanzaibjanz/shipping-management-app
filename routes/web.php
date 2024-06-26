<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\ShippingLineController;
use App\Http\Controllers\ContainerTypeController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {    
    Route::resource('users', UserController::class);
    Route::resource('agents', AgentController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('shippers', ShipperController::class);
    Route::resource('shipping-lines', ShippingLineController::class);
    Route::resource('shipments', ShipmentController::class);
    Route::resource('containertypes', ContainerTypeController::class);
});
