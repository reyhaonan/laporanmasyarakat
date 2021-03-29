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
Route::post('/laporkan',[App\Http\Controllers\PengaduanController::class, 'store'])->middleware('auth');


Route::middleware(['petugas'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\dashboardController::class, 'index']);
    Route::get('/dashboard/petugas', [App\Http\Controllers\dashboardController::class, 'petugas']);
    Route::get('/dashboard/masyarakat', [App\Http\Controllers\dashboardController::class, 'masyarakat']);
    Route::get('/dashboard/pengaduan', [App\Http\Controllers\dashboardController::class, 'pengaduan']);
    Route::get('/dashboard/tanggapan', [App\Http\Controllers\dashboardController::class, 'tanggapan']);

    Route::post('/dashboard/tanggap',[App\Http\Controllers\TanggapanController::class, 'store']);
    Route::post('/user/delete/{id}',[App\Http\Controllers\dashboardController::class, 'deleteUser']);
    Route::post('/pengaduan/delete/{id}',[App\Http\Controllers\PengaduanController::class, 'destroy']);
    Route::post('/tanggapan/delete/{id}',[App\Http\Controllers\TanggapanController::class, 'destroy']);
});



/**
 * for protecting auth
 * ->middleware('auth');
 */
