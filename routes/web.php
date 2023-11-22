<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ObatKeluarController;
use App\Http\Controllers\ObatMasukController;
use App\Http\Controllers\PermintaanController;


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
    return view('layouts.app');
});

Route::resource('/admin',AdminController::class);
Route::resource('/dashboard',DashboardController::class);
Route::resource('/user',UserController::class);
Route::resource('/profile',ProfileController::class);
Route::resource('/obat-keluar',ObatKeluarController::class);
Route::resource('/obat-masuk',ObatMasukController::class);
Route::resource('/permintaan',ObatPermintaanController::class);

Route::get('/user-edit/{id}',[UserController::class,'edit']);
Route::get('/profile-edit/{id}',[ProfileController::class,'edit']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
