<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LogAccessMiddleware;
use Illuminate\Support\Facades\Route;



Route::middleware(LogAccessMiddleware::class)->group(function () {
    Route::get('/{erro?}', [LoginController::class,'index'])->name('login');
    Route::post('/', [LoginController::class,'authentication'])->name('login');
});

//for more information about rotues, use the command: php artisan route:list
//Passar o parametro de id do usuario autenticado em todas as rotas para evita bugs
Route::middleware('authentication')->prefix('/system')->group(function(){
    
    Route::get('/publisher', [PublisherController::class, 'index'])->name('publisher.index');
    Route::post('/publisher', [PublisherController::class, 'store'])->name('publisher.store');

    Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
    Route::get('/publisher/{publisher}', [PublisherController::class, 'show'])->name('publisher.show');

    Route::get('/publisher/{publisher}/edit', [PublisherController::class, 'edit'])->name('publisher.edit');
    Route::put('/publisher/{publisher}', [PublisherController::class, 'update'])->name('publisher.update');

    Route::delete('/publisher/{publisher}', [PublisherController::class, 'destroy'])->name('publisher.destroy');


    Route::get('/logout', [LoginController::class,'logout'])->name('logout');


    Route::get('/domain', [DomainController::class, 'index'])->name('domain.index');
    Route::post('/domain', [DomainController::class, 'store'])->name('domain.store');

    Route::get('/domain/create', [DomainController::class, 'create'])->name('domain.create');
    Route::get('/domain/{domain}', [DomainController::class, 'show'])->name('domain.show');

    Route::get('/domain/{domain}/edit', [DomainController::class, 'edit'])->name('domain.edit');
    Route::put('/domain/{domain}', [DomainController::class, 'update'])->name('domain.update');

    Route::delete('/domain/{domain}', [DomainController::class, 'destroy'])->name('domain.destroy');


    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');

    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');

    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');

    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});


