<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\ErrorException;
use App\Models\Banner;
use App\Models\Food;
use App\Models\News;

class WebPageController extends Controller
{

    public function index(Request $request)
    {

        return view('FrontPage.index', [
            'banners' => Banner::orderBy('sort_idx', 'asc')->get(),
            'foods'   => Food::where('is_recommendation',1)->orderBy('sort_idx', 'asc')->get(),
            'news'    => News::orderBy('is_top', 'desc')->limit(6)->get()
        ]);
    }

}
