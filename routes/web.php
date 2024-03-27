<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublisherController;
use App\Http\Middleware\LogAccessMiddleware;
use Illuminate\Support\Facades\Route;



Route::middleware(LogAccessMiddleware::class)->group(function () {
    Route::get('/{erro?}', [LoginController::class,'index'])->name('login');
    Route::post('/', [LoginController::class,'authentication'])->name('login');
});

//for more information about rotues, use the command: php artisan route:list
Route::middleware('authentication')->prefix('/user')->group(function(){
    
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
});

//Irei usar a classe user para alterar a rota apos a autenticação do usuario, se a role do user for admin, ira acessar outra rota
Route::middleware('authentication')->prefix('/admin')->group(function(){
    
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

    

});


