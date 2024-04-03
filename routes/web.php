<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


    Route::get('/{erro?}', [LoginController::class,'index'])->name('login');
    Route::post('/', [LoginController::class,'authentication'])->name('login');


//for more information about rotues, use the command: php artisan route:list
Route::middleware(['auth'])->prefix('/system')->group(function(){
    
    Route::get('/publisher', [PublisherController::class, 'index'])->name('publisher.index')->middleware('needsRole:admin');
    Route::post('/publisher', [PublisherController::class, 'store'])->name('publisher.store')->middleware('needsRole:admin');

    Route::post('/publisher/find', [PublisherController::class, 'find'])->name('publisher.find');
    Route::get('/publisher/orderById', [PublisherController::class, 'orderById'])->name('publisher.orderById');
    Route::get('/publisher/orderByName', [PublisherController::class, 'orderByName'])->name('publisher.orderByName');
    Route::get('/publisher/orderByPhone', [PublisherController::class, 'orderByPhone'])->name('publisher.orderByPhone');
    Route::get('/publisher/orderByEmail', [PublisherController::class, 'orderByEmail'])->name('publisher.orderByEmail');
    Route::get('/publisher/orderByDocument', [PublisherController::class, 'orderByDocument'])->name('publisher.orderByDocument');


    Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create')->middleware('needsRole:admin');
    Route::get('/publisher/{publisher}', [PublisherController::class, 'show'])->name('publisher.show')->middleware('needsRole:admin');

    Route::get('/publisher/{publisher}/edit', [PublisherController::class, 'edit'])->name('publisher.edit')->middleware('needsRole:admin');
    Route::put('/publisher/{publisher}', [PublisherController::class, 'update'])->name('publisher.update')->middleware('needsRole:admin');

    Route::delete('/publisher/{publisher}', [PublisherController::class, 'destroy'])->name('publisher.destroy')->middleware('needsRole:admin');


    Route::get('/logout', [LoginController::class,'logout'])->name('logout');


    Route::get('/domain', [DomainController::class, 'index'])->name('domain.index');
    Route::post('/domain', [DomainController::class, 'store'])->name('domain.store');

    Route::post('/domain/find', [DomainController::class, 'find'])->name('domain.find');
    Route::get('/domain/orderById', [DomainController::class, 'orderById'])->name('domain.orderById');
    Route::get('/domain/orderByUri', [DomainController::class, 'orderByUri'])->name('domain.orderByUri');
    Route::get('/domain/orderByPublisher', [DomainController::class, 'orderByPublisher'])->name('domain.orderByPublisher');
    Route::get('/domain/orderByRavshare', [DomainController::class, 'orderByRavshare'])->name('domain.orderByRavshare');
    Route::get('/domain/orderByStatus', [DomainController::class, 'orderByStatus'])->name('domain.orderByStatus');


    Route::get('/domain/create', [DomainController::class, 'create'])->name('domain.create');
    Route::get('/domain/{domain}', [DomainController::class, 'show'])->name('domain.show');

    Route::get('/domain/{domain}/edit', [DomainController::class, 'edit'])->name('domain.edit');
    Route::put('/domain/{domain}', [DomainController::class, 'update'])->name('domain.update');

    Route::delete('/domain/{domain}', [DomainController::class, 'destroy'])->name('domain.destroy');

    Route::get('/reports', [ReportsController::class, 'reports'])->name('reports.index');



    Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('needsRole:admin');
    Route::post('/user', [UserController::class, 'store'])->name('user.store')->middleware('needsRole:admin');

    Route::post('/user/find', [UserController::class, 'find'])->name('user.find');

    Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware('needsRole:admin');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show')->middleware('needsRole:admin');

    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('needsRole:admin');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update')->middleware('needsRole:admin');

    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('needsRole:admin');
});
