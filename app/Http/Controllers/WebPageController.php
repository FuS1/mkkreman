<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\ErrorException;
use App\Models\PageContent;
use App\Models\Banner;
use App\Models\Food;
use App\Models\News;
use App\Models\Store;
use App\Models\AboutUsPerson;
use App\Models\Seminar;
use App\Models\SeminarPost;
use App\Models\SeminarStory;
use App\Models\SystemVariable;

class WebPageController extends Controller
{

    public function index(Request $request)
    {

        return view('FrontPage.index', [
            'banners'       => Banner::orderBy('sort_idx', 'asc')->get(),
            'foods'         => Food::where('is_recommendation',1)->orderBy('sort_idx', 'asc')->get(),
            'news'          => News::where('show_in_index',1)->orderBy('is_top', 'desc')->limit(6)->get(),
            'seminarStory'  => SeminarStory::where('show_in_index',1)->orderBy('sort_idx', 'asc')->get(),
            'seminarPost'   => SeminarPost::where('show_in_index',1)->orderBy('sort_idx', 'asc')->get(),
        ]);
    }

    public function aboutUs(Request $request)
    {
        return view('FrontPage.about_us', [
            'pageContent'   => PageContent::where('page','about_us')->first(),
        ]);
    }

    public function contactUs(Request $request)
    {
        return view('FrontPage.contact_us', [
            'pageContent'   => PageContent::where('page','contact_us')->first(),
        ]);
    }

    public function foods(Request $request)
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

        return view('FrontPage.foods', [
            'pageContent'   => PageContent::where('page','food')->first(),
            'mainFood'      => $mainFood,
            'sideDish'      => $sideDish,
            'drink'         => $drink,
        ]);
    }

    public function newses(Request $request)
    {
        $news = News::orderBy('is_top', 'desc')->get();

        return view('FrontPage.newses', [
            'pageContent'   => PageContent::where('page','news')->first(),
            'news'        => $news,
        ]);
    }

    public function news(Request $request, $id)
    {
        $news = News::where('id',$id)->first();

        if(!$news){
            abort(404);
        }else{
            return view('FrontPage.news', [
                'news'        => $news,
            ]);
        }

    }

    public function stores(Request $request)
    {
        $stores = Store::orderBy('sort_idx', 'asc')->get();

        return view('FrontPage.stores', [
            'pageContent'   => PageContent::where('page','store')->first(),
            'store'        => $stores,
        ]);
    }

    public function recruitment(Request $request)
    {
        $stores = Store::orderBy('sort_idx', 'asc')->get();

        return view('FrontPage.recruitment', [
            'pageContent'   => PageContent::where('page','recruitment')->first(),
            'store'        => $stores,
        ]);
    }

    public function seminar(Request $request)
    {
        return view('FrontPage.seminar', [
            'pageContent'   => PageContent::where('page','seminar')->first(),
        ]);
    }

    public function seminarPost(Request $request)
    {
        $seminarPost = SeminarPost::orderBy('sort_idx', 'asc')->get();

        return view('FrontPage.seminarPost', [
            'seminarPost'   => $seminarPost
        ]);
    }

    public function seminarStory(Request $request)
    {
        $seminarStory = SeminarStory::orderBy('sort_idx', 'asc')->get();

        return view('FrontPage.seminarStory', [
            'seminarStory'   => $seminarStory
        ]);
    }

}
