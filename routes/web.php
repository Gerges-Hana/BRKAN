<?php

use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PurchaseOrdersController;
use App\Http\Controllers\Admin\PurchaseOrderStatusesController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TemplateController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [StatisticsController::class, 'index']);
    Route::get('/orders', [TemplateController::class, 'orders']);
    Route::get('/reports', [TemplateController::class, 'reports']);

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('orders', PurchaseOrdersController::class);
    Route::resource('status', PurchaseOrderStatusesController::class);
    Route::post('orders/edit/{id}', [PurchaseOrdersController::class, 'update']);

    Route::post('/users-data', [UserController::class, 'getUserData'])->name('users.data');
    Route::post('/orders-data', [PurchaseOrdersController::class, 'getOrdersData'])->name('orders.data');
    Route::get('/orders-history/{id}', [PurchaseOrdersController::class, 'HistoryOfPurchaseOrdersC'])->name('orders.history');
    Route::controller(SearchController::class)->group(function () {
        Route::get('demo-search', 'index');
        Route::get('autocomplete', 'autocomplete')->name('autocomplete');
        Route::post('/search-result', 'searchResult')->name('search.result');
    });

    Route::get('/fetch-notifications', [NotificationController::class, 'fetchNotifications'])->name('fetch.notifications');

});
