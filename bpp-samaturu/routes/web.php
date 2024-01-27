<?php

use App\Http\Livewire\Laporan;
use App\Http\Livewire\Manajuser;
use App\Http\Livewire\Rekomendasi;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\RatingKecocokan;
use App\Http\Livewire\HasilPerhitungan;

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
    return redirect('/login'); //redirect ke halaman login
});

// matikan register
Auth::routes(['register' => false]);

// matikan reset password
Auth::routes(['reset' => false]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('alternatifs', 'livewire.alternatifs.index')->middleware('auth');
	Route::view('kriterias', 'livewire.kriterias.index')->middleware('auth');
	Route::view('petanis', 'livewire.petanis.index')->middleware('auth');

    Route::get('kecocokan', RatingKecocokan::class)->middleware('auth');
    Route::get('hasil', HasilPerhitungan::class)->middleware('auth');
    Route::get('laporan', Laporan::class)->middleware('auth');
    Route::get('users', Manajuser::class)->middleware('auth');
    Route::get('rekomendasi', Rekomendasi::class)->middleware('auth');
