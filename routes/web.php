<?php

use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PurchaseOrdersController;
use App\Http\Controllers\Admin\PurchaseOrderStatusesController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    //Home
    Route::get('/', [StatisticsController::class, 'index']);

    // Reports
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.data');

    // Roles
    Route::resource('roles', RoleController::class);
    Route::group(['prefix' => 'roles'], function () {
        Route::post('/data', [RoleController::class, 'getOrdersData'])->name('roles.data');
        Route::post('/checkHasRelations/{id}', [RoleController::class, 'checkHasRelations'])->name('roles.checkHasRelations');
        Route::post('/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

    // Purchase Orders
    Route::resource('orders', PurchaseOrdersController::class);
    Route::group(['prefix' => 'orders'], function () {
        Route::post('/data', [PurchaseOrdersController::class, 'getOrdersData'])->name('orders.data');
        Route::get('/history/{id}', [PurchaseOrdersController::class, 'HistoryOfPurchaseOrdersC'])->name('orders.history');
        Route::post('/edit/{id}', [PurchaseOrdersController::class, 'update'])->name('orders.update');
        Route::post('/checkHasRelations/{id}', [PurchaseOrdersController::class, 'checkHasRelations'])->name('orders.checkHasRelations');
        Route::post('/delete/{id}', [PurchaseOrdersController::class, 'destroy'])->name('orders.destroy');
    });

    // Users
    Route::resource('users', UserController::class);
    Route::group(['prefix' => 'users'], function () {
        Route::post('/users/data', [UserController::class, 'getUsersData'])->name('users.data');
        Route::post('/checkHasRelations/{id}', [UserController::class, 'checkHasRelations'])->name('users.checkHasRelations');
        Route::post('/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Purchase Order Statuses
    Route::resource('status', PurchaseOrderStatusesController::class);

    // Notifications
    Route::get('/fetch-notifications', [NotificationController::class, 'fetchNotifications'])->name('fetch.notifications');

});
