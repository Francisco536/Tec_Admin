<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('logout', [LogController::class, 'logout'])->name('salir');


    Route::group(['prefix' => 'admin'], function(){
        Route::get('/index', [AdminController::class, 'index'])->name('lista.admin')->middleware('auth');
        Route::get('/{id}/show', [AdminController::class, 'show'])->name('ver.admin')->middleware('auth');
        Route::get('/create', [AdminController::class, 'create'])->name('add.admin')->middleware('auth');
        Route::post('/store', [AdminController::class, 'store'])->name('store.admin')->middleware('auth');
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit.admin')->middleware('auth');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('update.admin')->middleware('auth');
        Route::get('destroy/{admin}', [AdminController::class, 'destroy'])->name("destroy.admin")->middleware('auth');

    });
    Route::group(['prefix' => 'docente'], function(){
        Route::get('/index', [DocenteController::class, 'index'])->name('lista.docente')->middleware('auth');
        Route::get('/{id}/show', [DocenteController::class, 'show'])->name('ver.docente')->middleware('auth');
        Route::get('/create', [DocenteController::class, 'create'])->name('add.docente')->middleware('auth');
        Route::post('/store', [DocenteController::class, 'store'])->name('store.docente')->middleware('auth');
        Route::get('/{id}/edit', [DocenteController::class, 'edit'])->name('edit.docente')->middleware('auth');
        Route::post('/update/{id}', [DocenteController::class, 'update'])->name('update.docente')->middleware('auth');
        Route::get('destroy/{docente}', [DocenteController::class, 'destroy'])->name("destroy.docente")->middleware('auth');


    });
});
