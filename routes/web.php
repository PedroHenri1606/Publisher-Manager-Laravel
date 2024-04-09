<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


    Route::get('/{erro?}', [LoginController::class,'index'])->name('login');
    Route::post('/', [LoginController::class,'authentication'])->name('login');


//for more information about routes, use the command: php artisan route:list
Route::middleware(['auth'])->prefix('/system')->group(function(){
    
//------------------------------------------------------------------------------------------------------------------------

    //---PUBLISHER GET
    Route::get('/publisher', [PublisherController::class, 'index'])->name('publisher.index')->middleware('needsRole:admin');
    Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create')->middleware('needsRole:admin');
    Route::get('/publisher/{publisher}', [PublisherController::class, 'show'])->name('publisher.show')->middleware('needsRole:admin');
    Route::get('/publisher/{publisher}/edit', [PublisherController::class, 'edit'])->name('publisher.edit')->middleware('needsRole:admin');
    
    //---PUBLISHER POST
    Route::post('/publisher', [PublisherController::class, 'store'])->name('publisher.store')->middleware('needsRole:admin');

    //---PUBLISHER PUT
    Route::put('/publisher/{publisher}', [PublisherController::class, 'update'])->name('publisher.update')->middleware('needsRole:admin');

    //---PUBLISHER DELETE
    Route::delete('/publisher/{publisher}', [PublisherController::class, 'destroy'])->name('publisher.destroy')->middleware('needsRole:admin');

//------------------------------------------------------------------------------------------------------------------------

    //---lOGOUT
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');

//------------------------------------------------------------------------------------------------------------------------

    //---DOMAIN GET
    Route::get('/domain', [DomainController::class, 'index'])->name('domain.index');
    Route::get('/domain/create', [DomainController::class, 'create'])->name('domain.create');
    Route::get('/domain/{domain}', [DomainController::class, 'show'])->name('domain.show');
    Route::get('/domain/{domain}/edit', [DomainController::class, 'edit'])->name('domain.edit');

    //---DOMAIN POST
    Route::post('/domain', [DomainController::class, 'store'])->name('domain.store');

    //---DOMAIN PUT
    Route::put('/domain/{domain}', [DomainController::class, 'update'])->name('domain.update');

    //---DOMAIN DELETE
    Route::delete('/domain/{domain}', [DomainController::class, 'destroy'])->name('domain.destroy');

//------------------------------------------------------------------------------------------------------------------------

    //---REPORTS GET
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
    Route::get('/reports/historic/{domain}', [ReportsController::class, 'historic'])->name('reports.historic');
    Route::get('/reports/{domain}', [ReportsController::class, 'show'])->name('reports.show');
    Route::get('/reports/create/{domain}', [ReportsController::class, 'create'])->name('reports.create');

    //---REPORTS POST
    Route::post('/reports', [ReportsController::class, 'store'])->name('reports.store');

//------------------------------------------------------------------------------------------------------------------------

    //---USER GET
    Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('needsRole:admin');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware('needsRole:admin');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show')->middleware('needsRole:admin');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('needsRole:admin');

    //---USER POST
    Route::post('/user', [UserController::class, 'store'])->name('user.store')->middleware('needsRole:admin');

    //---USER PUT
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update')->middleware('needsRole:admin');

    //---USER DELETE
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('needsRole:admin');

//------------------------------------------------------------------------------------------------------------------------

});
