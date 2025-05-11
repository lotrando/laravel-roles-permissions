<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Default index route
Route::get('/', function () {
    return view('index');
})->name('index');

// Locale switcher
Route::post('/set-locale', function (Request $request) {
    $locale = $request->input('locale');
    if (in_array($locale, ['cs', 'en'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return response()->json(['success' => true]);
});

// Routes group for all authorized users
Route::middleware(['auth'])->group(function () {

    Route::get('home', function () {
        return view('home');
    })->name('home');

    Route::get('/two-factor-qr', function () {
        return response()->json([
            'qr' => auth()->user()->two_factor_qr,
            'secret' => auth()->user()->two_factor_secret,
        ]);
    })->name('two-factor.qr');
});

// Route group for permission [user show] allowed
Route::middleware(['permission:user show'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users');
});

// Route group for permission [role show] allowed
Route::middleware(['permission:role show'])->group(function () {
    Route::get('roles', [RoleController::class, 'index'])->name('roles');
});

// Route group for permission [permission show] allowed
Route::middleware(['permission:permission show'])->group(function () {
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
});

// Route group for roles [admin|user create] allowed
Route::middleware(['role_or_permission:admin|user create'])->group(function () {
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
});

// Route group for roles [admin|role create] allowed
Route::middleware(['role_or_permission:admin|role create'])->group(function () {
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('role/update/{id}', [RoleController::class, 'update'])->name('role.update');
});

// Route group for roles [admin|permission create] allowed
Route::middleware(['role_or_permission:admin|permission create'])->group(function () {
    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
});

// Route group for roles [admin|permission edit] allowed
Route::middleware(['role_or_permission:admin|permission edit'])->group(function () {
    Route::post('permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
});

// Route group for roles [admin|user delete] allowed
Route::middleware(['role_or_permission:admin|user delete'])->group(function () {
    Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

// Route group for roles [admin|role delete] allowed
Route::middleware(['role_or_permission:admin|role delete'])->group(function () {
    Route::get('role/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
});

// Route group for roles [admin|permission delete] allowed
Route::middleware(['role_or_permission:admin|permission delete'])->group(function () {
    Route::get('permission/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
});
