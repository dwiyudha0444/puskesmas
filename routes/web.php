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

use App\Http\Controllers\PermintaanDetailController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\PersediaanController;

use App\Http\Controllers\LplpoController;


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
    return view('home.index');
});

Route::resource('/admin',AdminController::class)->middleware('auth');
Route::resource('/dashboard',DashboardController::class)->middleware('auth');
Route::resource('/user',UserController::class)->middleware('auth');
Route::resource('/profile',ProfileController::class)->middleware('auth');
Route::resource('/obat-keluar',ObatKeluarController::class)->middleware('auth');
Route::resource('/obat-masuk',ObatMasukController::class)->middleware('auth');
Route::resource('/permintaan',PermintaanController::class)->middleware('auth');

Route::resource('/pemakaian',PemakaianController::class)->middleware('auth');
Route::resource('/persediaan',PersediaanController::class)->middleware('auth');
Route::resource('/permintaan-detail',PermintaanDetailController::class)->middleware('auth');

Route::resource('/obat',ObatController::class)->middleware('auth');
Route::resource('/kategori',KategoriController::class)->middleware('auth');

Route::get('/user-edit/{id}',[UserController::class,'edit'])->middleware('auth');
Route::get('/profile-edit/{id}',[ProfileController::class,'edit'])->middleware('auth');
Route::get('/permintaan-edit/{id}',[PermintaanController::class,'edit'])->middleware('auth');
Route::get('/obat-masuk-edit/{id}',[ObatMasukController::class,'edit'])->middleware('auth');
Route::get('/obat-keluar-edit/{id}',[ObatKeluarController::class,'edit'])->middleware('auth');
Route::get('/pemakaian-edit/{id}',[PemakaianController::class,'edit'])->middleware('auth');
Route::get('/persediaan-edit/{id}',[PersediaanController::class,'edit'])->middleware('auth');
Route::get('/permintaan-detail-edit/{id}',[PermintaanDetailController::class,'edit'])->middleware('auth');
Route::get('/obat-edit/{id}',[ObatController::class,'edit'])->middleware('auth');
Route::get('/kategori-edit/{id}',[KategoriController::class,'edit'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//PDF
Route::get('pemakaian_pdf',[PemakaianController::class, 'expPDF']);
Route::get('persediaan_pdf',[PersediaanController::class, 'expPDF']);
Route::get('permintaan_detail_pdf',[PermintaanDetailController::class, 'expPDF']);
Route::get('lplpo_pdf',[LplpoController::class, 'expPDF']);