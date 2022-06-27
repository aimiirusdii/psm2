<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


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
     return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');

})->name('dashboard');


Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/notification', [Controllers\NotificationController::class, 'index'])->name('notification');
Route::get('/wastetrap', [Controllers\WasteController::class, 'index'])->name('wastetrap');
Route::get('/history', [Controllers\HistoryController::class, 'index'])->name('history');

Route::get('/devices', [Controllers\DeviceController::class, 'index'])->name('devices.index');
Route::post('/devices/store', [Controllers\DeviceController::class, 'store'])->name('devices.store');
Route::get('/devices/create', [Controllers\DeviceController::class, 'create'])->name('devices.create');
Route::get('/devices/show/{id}', [Controllers\DeviceController::class, 'show'])->name('devices.show');
Route::post('devices/update', [Controllers\DeviceController::class, 'update']);
Route::delete('/devices/destroy/{id}', [Controllers\DeviceController::class, 'destroy'])->name('devices.destroy');
Route::get('/devices/edit/{id}', [Controllers\DeviceController::class, 'edit'])->name('devices.edit');


Route::get('/user', [Controllers\UserController::class, 'index'])->name('user.index');
Route::post('/user/store', [Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/create', [Controllers\UserController::class, 'create'])->name('user.create');
Route::get('/user/show/{id}', [Controllers\UserController::class, 'show'])->name('user.show');
Route::post('user/update', [Controllers\UserController::class, 'update']);
Route::delete('/user/destroy/{id}', [Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/edit/{id}', [Controllers\UserController::class, 'edit'])->name('user.edit');

Route::post('/notification/store', [Controllers\NotificationController::class, 'store']);
Route::get('/notification/update/{id}', [Controllers\NotificationController::class, 'update']);






