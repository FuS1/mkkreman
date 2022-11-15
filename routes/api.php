<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TinymceController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\SeminarController;

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
            'prefix' => 'news',
        ], function () {
            Route::get  ('',      [NewsController::class, 'getNews'] );
            Route::post ('',      [NewsController::class, 'saveNews'] );
            Route::delete('',     [NewsController::class, 'deleteNews'] );
        });

        Route::group([
            'prefix' => 'seminar',
        ], function () {
            Route::get  ('',      [SeminarController::class, 'getSeminar'] );
            Route::post ('',      [SeminarController::class, 'saveSeminar'] );
            Route::delete('',     [SeminarController::class, 'deleteSeminar'] );
        });

        Route::group([
            'prefix' => 'admin',
        ], function () {
            Route::post('',                [AdminController::class, 'saveAdmin'] );
            Route::delete('',              [AdminController::class, 'deleteAdmin'] );
            Route::put ('password',        [AdminController::class, 'changePassword'] );
            Route::put ('password/reset',  [AdminController::class, 'resetPassword'] );
        });

        Route::group([
            'prefix' => 'tabulator',
        ], function () {
            Route::get ('banner', [BannerController::class, 'tabulator'] );
            Route::get ('news',   [NewsController::class,   'tabulator'] );
            Route::get ('seminar',[SeminarController::class,   'tabulator'] );
            Route::get ('admin',  [AdminController::class,   'tabulator'] );
        });

        Route::post ('tinymce/image',      [TinymceController::class, 'saveImage'] );
    });
    
});


