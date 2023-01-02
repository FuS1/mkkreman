<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TinymceController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\PageContentController;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\StoreController;
use App\Http\Controllers\API\MainFoodController;
use App\Http\Controllers\API\SideFoodController;
use App\Http\Controllers\API\HotFoodController;
use App\Http\Controllers\API\DrinkController;
use App\Http\Controllers\API\SystemVariableController;
use App\Http\Controllers\API\SeminarController;
use App\Http\Controllers\API\SeminarParticipantController;
use App\Http\Controllers\API\SeminarStoryController;
use App\Http\Controllers\API\SeminarPostController;
use App\Http\Controllers\API\AboutUsController;
use App\Http\Controllers\API\ContactUsController;


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

// 以下為前臺
Route::post('contactUs/mail',   [ContactUsController::class, 'mail'] );
Route::post('seminar/participant',[SeminarParticipantController::class, 'saveSeminarParticipant'] );
Route::get ('seminar',          [SeminarController::class, 'getSeminars'] );
Route::get ('store',            [StoreController::class, 'getStores'] );


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
            'prefix' => 'store',
        ], function () {
            Route::get  ('',      [StoreController::class, 'getStore'] );
            Route::post ('',      [StoreController::class, 'saveStore'] );
            Route::delete('',     [StoreController::class, 'deleteStore'] );
            Route::put  ('sort',  [StoreController::class, 'changeStoreSort'] );
        });

        Route::group([
            'prefix' => 'mainfood',
        ], function () {
            Route::get  ('',      [MainFoodController::class, 'getMainFood'] );
            Route::post ('',      [MainFoodController::class, 'saveMainFood'] );
            Route::delete('',     [MainFoodController::class, 'deleteMainFood'] );
            Route::put  ('sort',  [MainFoodController::class, 'changeMainFoodSort'] );
        });

        Route::group([
            'prefix' => 'sidefood',
        ], function () {
            Route::get  ('',      [SideFoodController::class, 'getSideFood'] );
            Route::post ('',      [SideFoodController::class, 'saveSideFood'] );
            Route::delete('',     [SideFoodController::class, 'deleteSideFood'] );
            Route::put  ('sort',  [SideFoodController::class, 'changeSideFoodSort'] );
        });

        Route::group([
            'prefix' => 'hotfood',
        ], function () {
            Route::get  ('',      [HotFoodController::class, 'getHotFood'] );
            Route::post ('',      [HotFoodController::class, 'saveHotFood'] );
            Route::delete('',     [HotFoodController::class, 'deleteHotFood'] );
            Route::put  ('sort',  [HotFoodController::class, 'changeHotFoodSort'] );
        });

        Route::group([
            'prefix' => 'drink',
        ], function () {
            Route::get  ('',      [DrinkController::class, 'getDrink'] );
            Route::post ('',      [DrinkController::class, 'saveDrink'] );
            Route::delete('',     [DrinkController::class, 'deleteDrink'] );
            Route::put  ('sort',  [DrinkController::class, 'changeDrinkSort'] );
        });


        Route::group([
            'prefix' => 'about_us',
        ], function () {
            Route::group([
                'prefix' => 'person',
            ], function () {

                Route::get  ('',      [AboutUsController::class, 'getAboutUsPerson'] );
                Route::post ('',      [AboutUsController::class, 'saveAboutUsPerson'] );
                Route::delete('',     [AboutUsController::class, 'deleteAboutUsPerson'] );
                Route::put  ('sort',  [AboutUsController::class, 'changeAboutUsPersonSort'] );
            });
        });

        Route::group([
            'prefix' => 'seminar',
        ], function () {
            Route::get  ('',      [SeminarController::class, 'getSeminar'] );
            Route::post ('',      [SeminarController::class, 'saveSeminar'] );
            Route::delete('',     [SeminarController::class, 'deleteSeminar'] );

            Route::group([
                'prefix' => 'participant',
            ], function () {
                Route::get  ('',      [SeminarParticipantController::class, 'getSeminarParticipant'] );
                Route::post ('',      [SeminarParticipantController::class, 'saveSeminarParticipant'] );
                Route::delete('',     [SeminarParticipantController::class, 'deleteSeminarParticipant'] );
            });
            
            Route::group([
                'prefix' => 'story',
            ], function () {
                Route::get  ('',      [SeminarStoryController::class, 'getSeminarStory'] );
                Route::post ('',      [SeminarStoryController::class, 'saveSeminarStory'] );
                Route::delete('',     [SeminarStoryController::class, 'deleteSeminarStory'] );
                Route::put  ('sort',  [SeminarStoryController::class, 'changeSeminarStorySort'] );
            });

            Route::group([
                'prefix' => 'post',
            ], function () {
                Route::get  ('',      [SeminarPostController::class, 'getSeminarPost'] );
                Route::post ('',      [SeminarPostController::class, 'saveSeminarPost'] );
                Route::delete('',     [SeminarPostController::class, 'deleteSeminarPost'] );
                Route::put  ('sort',  [SeminarPostController::class, 'changeSeminarPostSort'] );
            });
        });

        Route::resource('system_variable', SystemVariableController::class)->only([
            'index', 'update'
        ]);

        Route::group([
            'prefix' => 'pageContent',
        ], function () {
            Route::get  ('',      [PageContentController::class, 'getPageContent'] );
            Route::post ('',      [PageContentController::class, 'savePageContent'] );
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
            Route::get ('banner',               [BannerController::class, 'tabulator'] );
            Route::get ('news',                 [NewsController::class,   'tabulator'] );
            Route::get ('store',                [StoreController::class,   'tabulator'] );
            Route::get ('mainfood',             [MainFoodController::class,   'tabulator'] );
            Route::get ('sidefood',             [SideFoodController::class,   'tabulator'] );
            Route::get ('hotfood',              [HotFoodController::class,   'tabulator'] );
            Route::get ('drink',                [DrinkController::class,   'tabulator'] );
            Route::get ('seminar',              [SeminarController::class,   'tabulator'] );
            Route::get ('seminar/participant',  [SeminarParticipantController::class,   'tabulator'] );
            Route::get ('seminar/story',        [SeminarStoryController::class,   'tabulator'] );
            Route::get ('seminar/post',         [SeminarPostController::class,   'tabulator'] );
            Route::get ('admin',                [AdminController::class,   'tabulator'] );
            Route::get ('about_us/person',      [AboutUsController::class,   'personTabulator'] );
        });

        Route::post ('tinymce/image',      [TinymceController::class, 'saveImage'] );
    });
    
});


