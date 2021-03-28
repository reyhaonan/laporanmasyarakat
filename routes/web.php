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
    else if(Auth::user()->level == 'petugas')return redirect('/petugas');
    // else if(Auth::user()->level == 'masyarakat')return redirect('/');
});

Auth::routes();


Route::middleware(['petugas'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\dashboardController::class, 'index']);
    Route::get('/dashboard/petugas', [App\Http\Controllers\dashboardController::class, 'petugas']);
    Route::get('/dashboard/masyarakat', [App\Http\Controllers\dashboardController::class, 'masyarakat']);
    Route::get('/dashboard/pengaduan', [App\Http\Controllers\dashboardController::class, 'pengaduan']);
});



/**
 * for protecting auth
 * ->middleware('auth');
 */
