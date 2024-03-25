<?php

use Illuminate\Foundation\Auth\User;
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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware(['auth'])->group(function () {

    Route::get('home', function () {
        return view('home');
    })->name('home');

    Route::get('users', function () {
        $groupedUsers = User::orderBy('name')->get()->groupBy(function ($item) {
            return $item->name[0];
        });

        $groupedUsers->sortBy(function ($key) {      //sorts A-Z at the top level
            return $key;
        });
        // return $grouped;
        return view('users', ['users' => $groupedUsers]);
    })->middleware('role:user|admin|supervisor')->name('users');

    Route::get('roles', function () {
        $roles = Role::with('permissions')->orderBy('name')->get();
        // return $roles;
        return view('roles', ['roles' => $roles]);
    })->middleware('role:admin|supervisor')->name('roles');

    Route::get('permissions', function () {
        $permissions = Permission::with('roles')->orderBy('name')->get();
        // return $permissions;
        return view('permissions', ['permissions' => $permissions]);
    })->middleware('role:admin')->name('permissions');
});
