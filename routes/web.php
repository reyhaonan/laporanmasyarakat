<?php

use App\Models\Pengaduan;
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
    if(Auth::check()){
        $pengaduan = Pengaduan::where('id_pelapor',Auth::id())->orderBy('created_at','desc')->get();
        return view('welcome',['pengaduan' => $pengaduan]);
    }
    return view('welcome');
})->middleware('masyarakat');


Route::get('/gate', function () {
    if(Auth::user()->level == 'masyarakat')return redirect('/');
    else if(Auth::user()->level == 'petugas')return redirect('/dashboard');
})->middleware('auth');

Auth::routes();


Route::post('/laporkan',[App\Http\Controllers\PengaduanController::class, 'store'])->middleware('auth');


Route::middleware(['petugas'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/petugas', [App\Http\Controllers\DashboardController::class, 'petugas'])->name('petugas');
    Route::get('/dashboard/masyarakat', [App\Http\Controllers\DashboardController::class, 'masyarakat'])->name('masyarakat');
    Route::get('/dashboard/pengaduan', [App\Http\Controllers\DashboardController::class, 'pengaduan'])->name('pengaduan');
    Route::get('/dashboard/tanggapan', [App\Http\Controllers\DashboardController::class, 'tanggapan'])->name('tanggapan');

    Route::post('/tanggap',[App\Http\Controllers\TanggapanController::class, 'store']);
    Route::post('/user/delete/{id}',[App\Http\Controllers\DashboardController::class, 'deleteUser']);
    Route::post('/pengaduan/delete/{id}',[App\Http\Controllers\PengaduanController::class, 'destroy']);
    Route::post('/tanggapan/delete/{id}',[App\Http\Controllers\TanggapanController::class, 'destroy']);
    Route::post('/tanggapan/update/{id}',[App\Http\Controllers\TanggapanController::class, 'update']);
    Route::post('/user/update/{id}',[App\Http\Controllers\DashboardController::class, 'updateUser']);
    Route::post('/user/create',[App\Http\Controllers\DashboardController::class, 'createPetugas']);

    Route::get('/cetak_pdf', [App\Http\Controllers\DashboardController::class, 'cetakPdf']);
});



/**
 * for protecting auth
 * ->middleware('auth');
 */
