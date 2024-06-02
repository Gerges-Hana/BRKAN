<?php

use App\Http\Controllers\Admin\PurchaseOrdersController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SearchController;
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
Route::resource('orders', PurchaseOrdersController::class);

Route::post('/users-data', [UserController::class, 'getUserData'])->name('users.data');
Route::post('/orders-data', [PurchaseOrdersController::class, 'getOrdersData'])->name('orders.data');
// Route::post('/orders-history/{id}', [PurchaseOrdersController::class, 'HistoryOfPurchaseOrdersC'])->name('orders.history');
// Route::get('/orders-history/{id}', [PurchaseOrdersController::class, 'HistoryOfPurchaseOrdersC'])->name('orders.history.get');
Route::get('/orders-history/{id}', [PurchaseOrdersController::class, 'HistoryOfPurchaseOrdersC'])->name('orders.history');




Route::controller(SearchController::class)->group(function(){
    Route::get('demo-search', 'index');
    Route::get('autocomplete', 'autocomplete')->name('autocomplete');
    Route::post('/search-result', 'searchResult')->name('search.result');

});
