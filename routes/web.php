<?php

use App\Http\Controllers\Admin\ActivationRequestController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CompanyReportController;
use App\Http\Controllers\Admin\FacilityInspection;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/companies/create/report', [CompanyReportController::class, 'create_company'])->name('companies.create.report');
Route::post('/companies/report', [CompanyReportController::class, 'store'])->name('companies.store.report');
Route::get('/generate-pdf/print', [CompanyReportController::class, 'generatePdf'])->name('companies.generatePdf.print');
Route::get('/generate-pdf/show/{company}', [CompanyReportController::class, 'ShowPdf'])->name('companies.generatePdf.show');


Route::middleware(['auth'])->group(function () {
    //Home
    Route::get('/', [HomeController::class, 'index'])->name('/');
    Route::get('/home', [HomeController::class, 'home']);


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



    // company
    Route::resource('company', CompanyController::class);
    Route::group(['prefix' => 'company'], function () {
        Route::post('/data', [CompanyController::class, 'getCompanysData'])->name('company.data');
        Route::post('/checkHasRelations/{id}', [CompanyController::class, 'checkHasRelations'])->name('company.checkHasRelations');
        Route::post('/delete/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
    });


});



Route::post('/request-activation', [HomeController::class, 'requestActivation'])->name('request.activation');
Route::post('/admin/activate-account', [HomeController::class, 'activateAccount'])->name('activate.account');
// Route::post('/admin/activate-company', [HomeController::class, 'activateCompany'])->name('activate.company');
Route::get('/admin/activation-requests', [HomeController::class, 'showActivationRequests'])->name('admin.activation.requests');


Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('activation-requests', [ActivationRequestController::class, 'index'])->name('admin.activation_requests.index');
    Route::post('activation-requests/{id}/approve', [ActivationRequestController::class, 'approve'])->name('admin.activation_requests.approve');
});

Route::get('/admin/Facility_inspection', [FacilityInspection::class, 'Facility_inspection'])->name('Facility_inspection');



