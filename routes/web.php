<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/redirects', [HomeController::class, 'redirectUser'])->name('dashboard');
});



Route::group(['prefix' => 'admin', 'middleware' => [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]], function(){
    Route::get('admin_dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('pengajuan', [AdminController::class, 'pengajuanCuti'])->name('pengajuan.view');
    Route::get('rekapitulasi', [AdminController::class, 'rekapitulasiCuti'])->name('rekapitulasi.view');
    Route::get('kalender', [AdminController::class, 'viewKalender'])->name('kalender.view');
    Route::get('setting/cuti', [AdminController::class, 'settingCuti'])->name('setting.view');
    Route::post('kalender/store', [AdminController::class, 'storeKalender'])->name('store.kalender');
    Route::patch('kalender/update/{id}', [AdminController::class, 'updatekalender'])->name('kalender.update');
    Route::delete('kalender/destroy/{id}', [AdminController::class, 'kalenderDestroy'])->name('kalender.destroy');  
    Route::get('detail-pengajuan', [AdminController::class, 'detail'])->name('detail.view');
});

Route::group(['prefix' => 'pegawai'], function(){
    Route::get('pegawai_dashboard', [PegawaiController::class, 'index'])->name('pegawai.dashboard');
    Route::get('kalender', [PegawaiController::class, 'viewKalender'])->name('kalenderpegawai.view');
    Route::get('pengajuan', [PegawaiController::class, 'viewPengajuan'])->name('cuti.view');
    Route::get('pengajuan/add', [PegawaiController::class, 'addPengajuan'])->name('cuti.add');

});
