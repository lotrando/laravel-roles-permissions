<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Index page
Route::get('/', function () {
    return view('test');
})->name('index');


// Routes group for all authorized users
Route::middleware(['auth'])->group(function () {

    // Home page new registered users
    Route::get('home', function () {
        return view('home');
    })->name('home');

    // Defaut user role ( new user register ). Route group for all roles [user, supervisor, admin] allowed
    Route::middleware('role:user|supervisor|admin')->group(function () {
        Route::get('users', [UserController::class, 'index'])->name('users');
    });

    // Route group for roles [supervisor, admin] allowed
    Route::middleware('role:supervisor|admin')->group(function () {
        Route::get('roles', [RoleController::class, 'index'])->name('roles');
        Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
    });

    // Route group only admin allowed
    Route::middleware('role:admin')->prefix('admin')->group(function () {

        // Users
        Route::post('user/store', [UserController::class, 'store'])->name('user.store');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        // Roles routes
        Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
        Route::post('role/update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::get('role/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
        // Permission routes
        Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
        Route::post('permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::get('permission/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    });
});
