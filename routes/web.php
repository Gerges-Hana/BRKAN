<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TemplateController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::middleware(['auth'])->group(function () {
//    Route:: get('/{page}', [TemplateController::class, 'index']);
    Route::get('/', [TemplateController::class, 'home']);
    Route::get('/orders', [TemplateController::class, 'orders']);
    Route::get('/reports', [TemplateController::class, 'reports']);
});

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

