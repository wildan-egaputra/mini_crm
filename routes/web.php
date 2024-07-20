<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\PegawaiUserController;
use App\Http\Controllers\PegawaiEmployeController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\SuperadminDivisiController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\SuperadminUserController;
use App\Http\Controllers\SuperadminCompaniesController;
use App\Http\Controllers\SuperadminEmployeController;
use App\Http\Controllers\PegawaiDivisiController;



Route::get("/", [AuthController::class, 'login']);
Route::post("/", [AuthController::class, 'auth_login']);
Route::group(['middleware' => 'useradmin'], function (){
    Route::get("panel/dashboard", [DashboardController::class, 'dashboard']);
});
Route::get("logout", [AuthController::class, 'logout']);

use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});
use App\Http\Middleware\RoleMiddleware;
use App\Models\Employe;

Route::middleware([RoleMiddleware::class . ':pegawai'])->group(function() {
    Route::get('/pegawai/dashboard', function () {
        return view('pegawai/dashboard');
    });
    Route::get('/pegawai/companies', function () {
        return view('pegawai.companies.index');
    });
    Route::get('/pegawai/employe', function () {
        return view('pegawai.employe.index');
    });
    Route::get('/pegawai/divisi', function () {
        return view('pegawai.divisi.index');
    });
    Route::resource('pegawai/companies', \App\Http\Controllers\PegawaiCompaniesController::class);
    Route::resource('pegawai/users/', PegawaiUserController::class);
    Route::resource('pegawai/employe/', PegawaiEmployeController::class);
    Route::resource('pegawai/divisi', PegawaiDivisiController::class);
    Route::prefix('pegawai')->group(function () {
        Route::resource('divisi', PegawaiDivisiController::class)->names([
            'index' => 'pegawai.divisi.index',
            'create' => 'pegawai.divisi.create',
            'store' => 'pegawai.divisi.store',
            'show' => 'pegawai.divisi.show',
            'edit' => 'pegawai.divisi.edit',
            'update' => 'pegawai.divisi.update',
            'destroy' => 'pegawai.divisi.destroy',
        ]);
    });
    
});
require __DIR__.'/auth.php';

Route::get('panel/role', function () {
    return view('panel/role.list');
});
Route::get('panel/role/add', function () {
    return view('panel/role.add');
});
Route::middleware([RoleMiddleware::class . ':admin'])->group(function() {
    Route::get('/admin/dashboard', function () {
        return view('admin/dashboard');
    });
    Route::get('/admin/companies', function () {
        return view('admin.companies.index');
    });
    Route::get('/admin/users', function () {
        return view('admin.users.index');
    });
    Route::get('/admin/employe/index', function () {
        return view('admin.employe.index');
    })->name('admin.employe.index');
    Route::get('/admin/users/create', function () {
        return view('admin.users.store');
    });
    Route::get('/admin/divisi', function () {
        return view('admin/divisi/index');
    });
    Route::get('/admin/divisi/create', function () {
        return view('admin.divisi.create');
    });
    Route::resource('admin/divisi', DivisiController::class);
    Route::delete('/admin/employe/{employe}', [EmployeController::class, 'destroy'])->name('admin.employe.destroy');
    Route::get('/admin/employe/{employe}/edit', [EmployeController::class, 'edit'])->name('admin.employe.edit');
    Route::put('/admin/employe/{employe}', [EmployeController::class, 'update'])->name('admin.employe.update');
    Route::get('/admin/divisi/{divisi}/show', [DivisiController::class, 'show'])->name('admin.divisi.show');
    Route::resource('admin/employe/index', EmployeController::class);
    Route::resource('/employe/create', EmployeController::class);
    Route::resource('/companies/create', CompaniesController::class);
    Route::resource('/companies', \App\Http\Controllers\CompaniesController::class);
    Route::resource('admin/companies/', CompaniesController::class);
    Route::resource('admin/employe/', EmployeController::class);
    Route::resource('admin/users/', UserController::class);
    Route::resource('admin.users.store', UserController::class);
    Route::resource('admin/divisi', DivisiController::class);
});

Route::middleware([RoleMiddleware::class . ':superadmin'])->group(function() {
    
    Route::get('/superadmin/dashboard', function () {
        return view('superadmin.dashboard');
    })->name('superadmin.dashboard');
    Route::resource('superadmin/companies', SuperadminCompaniesController::class);
    // Resource routes for companies
    Route::resource('superadmin/companies', SuperadminCompaniesController::class)->names([
        'index' => 'superadmin.companies.index',
        'create' => 'superadmin.companies.create',
        'store' => 'superadmin.companies.store',
        'edit' => 'superadmin.companies.edit',
        'update' => 'superadmin.companies.update',
        'destroy' => 'superadmin.companies.destroy',
    ]);

    // Additional resource routes
    Route::resource('superadmin/users', SuperadminUserController::class)->names([
        'index' => 'superadmin.users.index',
        'create' => 'superadmin.users.create',
        'store' => 'superadmin.users.store',
        'edit' => 'superadmin.users.edit',
        'update' => 'superadmin.users.update',
        'destroy' => 'superadmin.users.destroy',
    ]);
    Route::resource('superadmin/employe', SuperadminEmployeController::class)->names([
        'index' => 'superadmin.employe.index',
        'create' => 'superadmin.employe.create',
        'store' => 'superadmin.employe.store',
        'edit' => 'superadmin.employe.edit',
        'update' => 'superadmin.employe.update',
        'destroy' => 'superadmin.employe.destroy',
    ]);

Route::resource('superadmin/users', UserController::class)->names([
    'index' => 'superadmin.users.index',
    'create' => 'superadmin.users.create',
    'store' => 'superadmin.users.store',
    'edit' => 'superadmin.users.edit',
    'update' => 'superadmin.users.update',
    'destroy' => 'superadmin.users.destroy',
]);

Route::prefix('superadmin')->group(function () {
    Route::resource('divisi', SuperadminDivisiController::class)->names([
        'index' => 'superadmin.divisi.index',
        'create' => 'superadmin.divisi.create',
        'store' => 'superadmin.divisi.store',
        'edit' => 'superadmin.divisi.edit',
        'update' => 'superadmin.divisi.update',
        'destroy' => 'superadmin.divisi.destroy',
        'show' => 'superadmin.divisi.show',
    ]);
    
});

});
