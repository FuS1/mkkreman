<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\ErrorException;
use App\Models\PageContent;
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

    public function foodList(Request $request)
    {
        $foods = Food::orderBy('sort_idx', 'asc')->get();

        $mainFood = $foods->filter(function ($food) {
            return $food->type == '拉麵系列';
        })->take(6);

        $sideDish = $foods->filter(function ($food) {
            return $food->type == '美味小菜';
        })->take(6);

        $drink    = $foods->filter(function ($food) {
            return $food->type == '清爽飲品';
        })->take(6);
        // dd($mainFood);
        return view('FrontPage.foodList', [
            'pageContent'   => PageContent::where('page','food')->first(),
            'mainFood'      => $mainFood,
            'sideDish'      => $sideDish,
            'drink'         => $drink,
        ]);
    }
}
