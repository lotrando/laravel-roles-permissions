<?php

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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware(['auth'])->group(function () {

    Route::get('home', function () {
        return view('home');
    })->middleware('role:user|admin|supervisor')->name('home');


    Route::get('users', function () {
        // return $grouped sorted by first letter from name
        $groupedUsers = User::orderBy('name')->get()->groupBy(function ($item) {
            return $item->name[0];
        });
        // sorts A-Z at the top level
        $groupedUsers->sortBy(function ($key) {
            return $key;
        });
        return view('users', ['users' => $groupedUsers]);
    })->middleware('role:user|admin|supervisor')->name('users');


    Route::get('roles', function () {
        // return sorted $roles;
        $roles = Role::with('permissions')->orderBy('name')->get();
        // return $roles;
        return view('roles', ['roles' => $roles]);
    })->middleware('role:admin|supervisor')->name('roles');


    Route::get('permissions', function () {
        // return sorted $permissions;
        $permissions = Permission::with('roles')->orderBy('name')->get();
        // return $permissions;
        return view('permissions', ['permissions' => $permissions]);
    })->middleware('role:admin')->name('permissions');
});
