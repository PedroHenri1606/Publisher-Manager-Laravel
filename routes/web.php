<?php

use App\Http\Controllers\PublisherController;
use App\Models\Domain;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    Route::get('/', [PublisherController::class,'index'])->name('principal');

    //for more information about rotues, use the command: php artisan route:list
    Route::middleware('authentication')->group(function(){
        Route::resource('publisher',PublisherController::class);
        Route::resource('domain', Domain::class);
    });
});
