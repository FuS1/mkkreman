<?php

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

Route::get('/', function () {
    return view('welcome');
});



// 以下為後臺
Route::group([
    'prefix' => '_admin_',
], function () {
    Route::get('',              function () { return redirect('_admin_/main');      });
    Route::get('main',          function () { return view('AdminPage.main');        });
    Route::get('login',         function () { return view('AdminPage.login');       });
    Route::get('banner_list',   function () { return view('AdminPage.banner_list'); });
    Route::get('news_list',     function () { return view('AdminPage.news_list');   });
    Route::get('news',          function () { return view('AdminPage.news');        });
    Route::get('admin_list',    function () { return view('AdminPage.admin_list');  });
});