<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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



Route::group(['prefix' => 'admin'], function(){
    Route::get('admin_dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('pengajuan', [AdminController::class, 'pengajuanCuti'])->name('pengajuan.view');
    Route::get('rekapitulasi', [AdminController::class, 'rekapitulasiCuti'])->name('rekapitulasi.view');
    Route::get('kalender', [AdminController::class, 'viewKalender'])->name('kalender.view');
    Route::get('setting/cuti', [AdminController::class, 'settingCuti'])->name('setting.view');
    Route::post('kalender/store', [AdminController::class, 'storeKalender'])->name('store.kalender');
});
