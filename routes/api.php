<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BandController;
use App\Http\Controllers\API\InstrumentController;
use App\Http\Controllers\API\TuneController;
use App\Http\Controllers\API\TabController;
use App\Http\Controllers\API\TrackController;
use App\Http\Controllers\API\FileController;

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
            'Tabs' => \App\Models\Tab::with(['band','tracks.tune','tracks.instrument'])->get()->all(),
            'Tracks' => \App\Models\Track::with(['instrument','tune'])->get()->all(),
        ]);
    });

    Route::apiResources([
        'bands' => BandController::class,
        'tabs' => TabController::class,
        'instruments' => InstrumentController::class,
        'tunes' => TuneController::class,
        'tracks' => TrackController::class,
    ]);

    Route::post('files/upload', [FileController::class, 'upload']);
    Route::post('files/move', [FileController::class, 'move']);
});

