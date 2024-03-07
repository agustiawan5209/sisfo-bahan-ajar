<?php

use App\Http\Controllers\Guru\SiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::group(['middleware'=> ['role:guru']],function () {
    Route::group(['prefix'=> 'data-guru', 'as'=> 'Guru.'], function(){
        Route::group(['prefix'=> 'siswa', 'as'=> 'Siswa.'], function(){
            Route::controller(SiswaController::class)->group(function(){
                Route::get('/', 'index')->name('index');
            });
        });
    });
});

require __DIR__.'/auth.php';

// Guru
