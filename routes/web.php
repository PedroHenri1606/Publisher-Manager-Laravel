<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublisherController;
use App\Http\Middleware\LogAccessMiddleware;
use Illuminate\Support\Facades\Route;



Route::middleware(LogAccessMiddleware::class)
    ->get('/login', [LoginController::class,'index'])
    ->name('login');    

//for more information about rotues, use the command: php artisan route:list
Route::middleware('authentication')->group(function(){
    
    Route::resource('publisher',PublisherController::class);
    Route::resource('domain', DomainController::class);
});


