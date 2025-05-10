<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
// Default route
Route::get('/', function () {
    return view('index');
})->name('index');

// Locales switcher
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

    // Home page new registered users
    Route::middleware('role:user|admin')->group(function () {
        // Home page for all users
        Route::get('home', function () {
            return view('home');
        })->name('home');
        // Qr code modal for two factor authentication
        Route::get('/two-factor-qr', function () {
            return response()->json([
                'qr' => auth()->user()->two_factor_qr,
                'secret' => auth()->user()->two_factor_secret,
            ]);
        })->name('two-factor.qr');
    });



    // Defaut User role Route group for all roles [user, supervisor, admin] allowed
    Route::middleware(['role:user|admin'])->group(function () {
        // Users routes
        Route::get('users', [UserController::class, 'index'])->name('users');
        // Roles routes
        Route::get('roles', [RoleController::class, 'index'])->name('roles');
        // Permissions routes
        Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
    });

    // Route group for roles [admin] allowed
    Route::middleware(['role:admin'])->group(function () {
        // Users routes
        Route::post('user/store', [UserController::class, 'store'])->name('user.store');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
        // Roles routes
        Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
        Route::post('role/update/{id}', [RoleController::class, 'update'])->name('role.update');
        // Permission routes
        Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
        Route::post('permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
    });

    // Route group only admin allowed
    Route::middleware('role:admin')->group(function () {
        // Users routes
        Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        // Roles routes
        Route::get('role/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
        // Permission routes
        Route::get('permission/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    });
});
