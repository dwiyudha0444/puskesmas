<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ObatKeluarController;
use App\Http\Controllers\ObatMasukController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\KategoriController;


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
Route::resource('/permintaan',PermintaanController::class);

Route::resource('/pemakaiaan',PemakaiaanController::class);
Route::resource('/persediaan',PersediaanController::class);
Route::resource('/permintaan-detail',PermintaanDetailController::class);

Route::resource('/obat',ObatController::class);
Route::resource('/kategori',KategoriController::class);

Route::get('/user-edit/{id}',[UserController::class,'edit']);
Route::get('/profile-edit/{id}',[ProfileController::class,'edit']);
Route::get('/permintaan-edit/{id}',[PermintaanController::class,'edit']);
Route::get('/obat-masuk-edit/{id}',[ObatMasukController::class,'edit']);
Route::get('/obat-keluar-edit/{id}',[ObatKeluarController::class,'edit']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
