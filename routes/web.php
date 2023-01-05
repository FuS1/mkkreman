<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebPageController;
use App\Http\Controllers\API\PageContentController;

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

Route::get('',              function () { return view('FrontPage.index');  });
Route::get('',              [WebPageController::class, 'index']         );
Route::get('aboutUs',       [WebPageController::class, 'aboutUs']       );
Route::get('food',          [WebPageController::class, 'foods']      );
Route::get('news',          [WebPageController::class, 'newses']      );
Route::get('news/{id}',     [WebPageController::class, 'news']      );
Route::get('store',         [WebPageController::class, 'stores']     );
Route::get('recruitment',   [WebPageController::class, 'recruitment']   );
Route::get('seminar',       [WebPageController::class, 'seminar']       );
Route::get('seminar/post',  [WebPageController::class, 'seminarPosts']       );
Route::get('seminar/post/{id}',  [WebPageController::class, 'seminarPost']       );
Route::get('seminar/story', [WebPageController::class, 'seminarStorys']       );
Route::get('seminar/story/{id}', [WebPageController::class, 'seminarStory']       );
Route::get('contactUs',     [WebPageController::class, 'contactUs']     );


// 以下為後臺
Route::group([
    'prefix' => '_admin_',
], function () {
    Route::get('',              function () { return redirect('_admin_/main');          });
    Route::get('main',          function () { return view('AdminPage.main');            });
    Route::get('login',         function () { return view('AdminPage.login');           });
    Route::get('banner_list',   function () { return view('AdminPage.banner_list');     });
    Route::get('news_list',     function () { return view('AdminPage.news_list');       });
    Route::get('news',          function () { return view('AdminPage.news');            });
    Route::get('store_list',    function () { return view('AdminPage.store_list');      });
    Route::get('store',         function () { return view('AdminPage.store');           });
    Route::get('main_food_list',            function () { return view('AdminPage.main_food_list');       });
    Route::get('main_food',                 function () { return view('AdminPage.main_food');            });
    Route::get('hot_food_list',             function () { return view('AdminPage.hot_food_list');       });
    Route::get('hot_food',                  function () { return view('AdminPage.hot_food');            });
    Route::get('side_food_list',            function () { return view('AdminPage.side_food_list');       });
    Route::get('side_food',                 function () { return view('AdminPage.side_food');            });
    Route::get('drink_list',                function () { return view('AdminPage.drink_list');       });
    Route::get('drink',                     function () { return view('AdminPage.drink');            });
    Route::get('admin_list',                function () { return view('AdminPage.admin_list');      });
    Route::get('contact_us_email',          function () { return view('AdminPage.contact_us_email');      });
    Route::get('seminar_list',              function () { return view('AdminPage.seminar_list');    });
    Route::get('seminar',                   function () { return view('AdminPage.seminar');         });
    Route::get('seminar_participant_list',  function () { return view('AdminPage.seminar_participant_list'); });
    Route::get('seminar_participant',       function () { return view('AdminPage.seminar_participant');      });
    Route::get('seminar_story_list',        function () { return view('AdminPage.seminar_story_list');       });
    Route::get('seminar_story',             function () { return view('AdminPage.seminar_story');            });
    Route::get('seminar_post_list',         function () { return view('AdminPage.seminar_post_list');        });
    Route::get('seminar_post',              function () { return view('AdminPage.seminar_post');             });
    Route::get('footer',                    function () { return view('AdminPage.footer');                   });
    
    Route::get('about_us_main_content',     function () { return view('AdminPage.about_us_main_content');    });
    Route::get('food_main_content',         function () { return view('AdminPage.food_main_content');        });
    Route::get('news_main_content',         function () { return view('AdminPage.news_main_content');        });
    Route::get('store_main_content',        function () { return view('AdminPage.store_main_content');       });
    Route::get('recruitment_main_content',  function () { return view('AdminPage.recruitment_main_content'); });
    Route::get('contact_us_main_content',   function () { return view('AdminPage.contact_us_main_content');  });
    Route::get('seminar_main_content',      function () { return view('AdminPage.seminar_main_content');     });
    
    
    Route::group([
        'prefix' => 'about_us',
    ], function () {
        Route::get('person_list',           function () { return view('AdminPage.about_us_person_list');     });
        Route::get('person',                function () { return view('AdminPage.about_us_person');          });
    
    });

    Route::get('file_manager',              function () { return view('AdminPage.file_manager');             });
    Route::get('page_editor',  [PageContentController::class, 'editor']);

});