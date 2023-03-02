<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'auth']);
Route::get('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'regis']);
Route::get('halaman', [UserController::class, 'index']);

Route::get('dashboard', [AdminController::class, 'index']);
Route::get('pengaduan', [AdminController::class, 'pengaduan']);
Route::get('tanggapan/{id}', [AdminController::class, 'tanggapan']);
Route::post('tanggapan/{id}', [AdminController::class, 'tanggapanStore']);
Route::get('admin', [AdminController::class, 'admin']);
Route::get('masyarakat', [AdminController::class, 'masyarakat']);

Route::get('pengaduan-masyarakat', [UserController::class, 'pengaduan']);
Route::get('pengaduan-masyarakat/tambah', [UserController::class, 'pengaduanTambah']);
Route::post('pengaduan-masyarakat/tambah', [UserController::class, 'pengaduanStore']);
Route::get('pengaduan-masyarakat/{id}', [UserController::class, 'pengaduanDetail']);
