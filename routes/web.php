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
Route::middleware(['auth', 'verified'])->group(function () {

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

// User Model //
// [user show] allowed
Route::middleware(['permission:user show'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('user.index');
});
// [user create] allowed
Route::middleware(['permission:user create'])->group(function () {
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
});
// [user edit] allowed
Route::middleware(['permission:user edit'])->group(function () {
    Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
});
// [user delete] allowed
Route::middleware(['permission:user delete'])->group(function () {
    Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});


// Role Model //
// [role show] allowed
Route::middleware(['permission:role show'])->group(function () {
    Route::get('roles', [RoleController::class, 'index'])->name('role.index');
});
// [role create] allowed
Route::middleware(['permission:role create'])->group(function () {
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
});
// [role edit] allowed
Route::middleware(['permission:role edit'])->group(function () {
    Route::post('role/update/{id}', [RoleController::class, 'update'])->name('role.update');
});
// [role delete] allowed
Route::middleware(['permission:role delete'])->group(function () {
    Route::get('role/destroy/{id}', [UserController::class, 'destroy'])->name('role.destroy');
});



// Permission Model //
// [permission show] allowed
Route::middleware(['permission:permission show'])->group(function () {
    Route::get('permissions', [PermissionController::class, 'index'])->name('permission.index');
});
// [permission create] allowed
Route::middleware(['permission:permission create'])->group(function () {
    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
});

// [permission edit] allowed
Route::middleware(['permission:permission edit'])->group(function () {
    Route::post('permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
});

// [permission delete] allowed
Route::middleware(['permission:permission delete'])->group(function () {
    Route::get('permission/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
});
