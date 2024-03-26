<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');


// Routes group for all authorized users
Route::middleware(['auth'])->group(function () {

    // Home page new registered users
    Route::get('home', function () {
        return view('home');
    })->name('home');

    Route::middleware('role:user|supervisor|admin')->group(function () {
        // Defaut user role ( new user register ). Route group for all roles [user, supervisor, admin] allowed

        Route::get('users', function () {
            $groupedUsers = User::orderBy('name')->get()->groupBy(function ($item) {
                return $item->name[0];
            });
            $groupedUsers->sortBy(function ($key) {
                return $key;
            });
            return view('users', ['users' => $groupedUsers]);
        })->name('users');
    });

    Route::middleware('role:supervisor|admin')->group(function () {
        // Route group for roles [supervisor, admin] allowed

        Route::get('roles', [RoleController::class, 'index'])->name('roles');

        Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
    });

    Route::middleware('role:admin')->group(function () {
        // Route group only admin allowed

        Route::post('role/store', [RoleController::class, 'create'])->name('role.create');
        Route::get('role/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

        Route::post('permission/store', [PermissionController::class, 'create'])->name('permission.create');
        Route::get('permission/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    });
});
