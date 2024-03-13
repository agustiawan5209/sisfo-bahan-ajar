<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\TopikController;



Route::group(['middleware'=> ['role:admin']],function () {
    Route::group(['prefix'=> 'data', 'as'=> 'Admin.'], function(){

        // Route Kelas
        Route::group(['prefix'=> 'kelas', 'as'=> 'Kelas.'], function(){
            Route::controller(KelasController::class)->group(function(){
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::put('/update', 'update')->name('update');
                Route::delete('/destroy', 'destroy')->name('destroy');
            });
        });

        // Route Topik
        Route::group(['prefix'=> 'topik', 'as'=> 'Topik.'], function(){
            Route::controller(TopikController::class)->group(function(){
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::put('/update', 'update')->name('update');
                Route::delete('/destroy', 'destroy')->name('destroy');
            });
        });
    });
});


