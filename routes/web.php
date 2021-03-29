<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/gate', function () {
    if(Auth::user()->level == 'masyarakat')return redirect('/');
    else if(Auth::user()->level == 'petugas')return redirect('/dashboard');
    // else if(Auth::user()->level == 'masyarakat')return redirect('/');
});

Auth::routes();

//login only
Route::get('/lapor',[App\Http\Controllers\PengaduanController::class, 'create'])->middleware('auth');
Route::get('/daftarlapor',[App\Http\Controllers\PengaduanController::class, 'index'])->middleware('auth');
Route::post('/laporkan',[App\Http\Controllers\PengaduanController::class, 'store'])->middleware('auth');


Route::middleware(['petugas'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/dashboard/petugas', [App\Http\Controllers\DashboardController::class, 'petugas']);
    Route::get('/dashboard/masyarakat', [App\Http\Controllers\DashboardController::class, 'masyarakat']);
    Route::get('/dashboard/pengaduan', [App\Http\Controllers\DashboardController::class, 'pengaduan']);
    Route::get('/dashboard/tanggapan', [App\Http\Controllers\DashboardController::class, 'tanggapan']);

    Route::post('/dashboard/tanggap',[App\Http\Controllers\TanggapanController::class, 'store']);
    Route::post('/user/delete/{id}',[App\Http\Controllers\DashboardController::class, 'deleteUser']);
    Route::post('/pengaduan/delete/{id}',[App\Http\Controllers\PengaduanController::class, 'destroy']);
    Route::post('/tanggapan/delete/{id}',[App\Http\Controllers\TanggapanController::class, 'destroy']);
    Route::post('/user/update/{id}',[App\Http\Controllers\DashboardController::class, 'updateUser']);
    Route::post('/user/create',[App\Http\Controllers\DashboardController::class, 'createPetugas']);

    Route::get('/user/edit/{id}',[App\Http\Controllers\DashboardController::class, 'editUser']);
});



/**
 * for protecting auth
 * ->middleware('auth');
 */
