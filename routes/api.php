<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->middleware(['localization'])->group( function() {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:sanctum')->group( function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('tokens', [AuthController::class, 'tokens'])->name('tokens');
    });

    Route::get('test', function (Request $request) {
        return response()->json([
            'locale' => app()->getLocale(),
            'locale_list' => config('app.locale_list'),
        ]);
    });
});

