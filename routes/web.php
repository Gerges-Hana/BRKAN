<?php

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
