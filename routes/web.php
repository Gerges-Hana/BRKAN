<?php

use App\Http\Controllers\RoleController;
// use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\TemplateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware(['auth'])->group(function () {
//    Route:: get('/{page}', [TemplateController::class, 'index']);
    Route::get('/', [TemplateController::class, 'home']);
    Route::get('/orders', [TemplateController::class, 'orders']);
    Route::get('/reports', [TemplateController::class, 'reports']);
});

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

