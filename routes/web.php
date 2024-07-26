<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login',[SessionController::class,'index']);
// Route::resource('laporan', LaporanController::class)->middleware('auth');
Route::get('/laporan', [LaporanController::class, 'index'])->middleware('auth')->name('laporan');
Route::post('/laporan/store', [LaporanController::class, 'store'])->middleware('auth')->name('laporan.store');
Route::post('login/store',[SessionController::class,'login']);