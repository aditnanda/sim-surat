<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/surat-masuk',[AdminController::class,'surat_masuk'])->name('surat_masuk');
    Route::get('/surat-masuk/generate/{id}',[AdminController::class,'surat_masuk_generate'])->name('surat_masuk.generate');
    Route::get('/surat-masuk/rekap/{id}',[AdminController::class,'surat_masuk_rekap'])->name('surat_masuk.rekap');
    Route::get('/surat-keluar',[AdminController::class,'surat_keluar'])->name('surat_keluar');
    Route::get('/surat-keluar/generate/{id}',[AdminController::class,'surat_keluar_generate'])->name('surat_keluar.generate');
    Route::get('/surat-keluar/rekap/{id}',[AdminController::class,'surat_keluar_rekap'])->name('surat_keluar.rekap');
    Route::get('/master-bidang',[AdminController::class,'master_bidang'])->name('master_bidang');


});

Route::get('am',function(Request $request){

    return view('secret.am');


});
