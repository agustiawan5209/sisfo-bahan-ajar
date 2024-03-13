<?php

use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware'=> ['role:admin']],function () {
    Route::group(['prefix'=> 'data', 'as'=> 'Admin.'], function(){
        Route::group(['prefix'=> 'kelas', 'as'=> 'Kelas.'], function(){
            Route::controller(KelasController::class)->group(function(){
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::put('/update', 'update')->name('update');
                Route::delete('/destroy', 'destroy')->name('destroy');
            });
        });
    });
});


