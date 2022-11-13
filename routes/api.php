<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\BannerController;

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



// 以下為後臺
Route::group([
    'prefix' => 'admin',
], function () {
    Route::post('login',     [AdminController::class, 'login'] );

    Route::group([
        'middleware'=>['auth:sanctum','check.admin.token']
    ], function () {

        Route::group([
            'prefix' => 'banner',
        ], function () {
            Route::post ('',      [BannerController::class, 'saveBanner'] );
            Route::delete('',     [BannerController::class, 'deleteBanner'] );
            Route::put  ('sort',  [BannerController::class, 'changeBannerSort'] );
        });


        Route::group([
            'prefix' => 'tabulator',
        ], function () {
            Route::get ('banner',             [BannerController::class, 'tabulator'] );
        });
    });
    
});


