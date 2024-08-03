<?php

use App\Http\Controllers\AdminController;
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


    Route::group(['prefix' => 'admin'], function(){
        Route::get('/index', [AdminController::class, 'index'])->name('lista.admin')->middleware('auth');
        Route::get('/{id}/show', [AdminController::class, 'show'])->name('ver.admin')->middleware('auth');
        Route::get('/create', [AdminController::class, 'create'])->name('add.admin')->middleware('auth');
        Route::post('/store', [AdminController::class, 'store'])->name('store.admin')->middleware('auth');
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit.admin')->middleware('auth');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('update.admin')->middleware('auth');
        Route::get('destroy/{admin}', [AdminController::class, 'destroy'])->name("destroy.admin")->middleware('auth');

    });
});
