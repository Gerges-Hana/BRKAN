<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Auth::routes();



Route::middleware(['auth'])->group(function () {
    //Home
    Route::get('/', [HomeController::class, 'index']);


    // Roles
    Route::resource('roles', RoleController::class);
    Route::group(['prefix' => 'roles'], function () {
        Route::post('/data', [RoleController::class, 'getOrdersData'])->name('roles.data');
        Route::post('/checkHasRelations/{id}', [RoleController::class, 'checkHasRelations'])->name('roles.checkHasRelations');
        Route::post('/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });


    // Users
    Route::resource('users', UserController::class);
    Route::group(['prefix' => 'users'], function () {
        Route::post('/data', [UserController::class, 'getUsersData'])->name('users.data');
        Route::post('/checkHasRelations/{id}', [UserController::class, 'checkHasRelations'])->name('users.checkHasRelations');
        Route::post('/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});
