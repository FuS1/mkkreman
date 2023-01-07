<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\ErrorException;
use App\Models\PageContent;
use App\Models\Banner;
use App\Models\HotFood;
use App\Models\MainFood;
use App\Models\SideFood;
use App\Models\Drink;
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
            'hotfoods'      => HotFood::orderBy('sort_idx', 'asc')->get(),
            'news'          => News::where('show_in_index',1)->orderBy('is_top', 'desc')->limit(6)->get(),
            'seminarStory'  => SeminarStory::where('show_in_index',1)->orderBy('sort_idx', 'asc')->get(),
            'seminarPost'   => SeminarPost::where('show_in_index',1)->orderBy('sort_idx', 'asc')->get(),
        ]);
    }

    public function aboutUs(Request $request)
    {
        return view('FrontPage.about_us', [
            'pageContent'   => PageContent::where('page','about_us')->first(),
            'aboutUsPerson' => AboutUsPerson::orderBy('sort_idx', 'asc')->get(),
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
        return view('FrontPage.foods', [
            'pageContent'   => PageContent::where('page','food')->first(),
            'mainFoods'     => MainFood::orderBy('sort_idx', 'asc')->get(),
            'sideFoods'     => SideFood::orderBy('sort_idx', 'asc')->get(),
            'drinks'        => Drink::orderBy('sort_idx', 'asc')->get(),
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

    public function seminarPosts(Request $request)
    {
        $seminarPost = SeminarPost::orderBy('sort_idx', 'asc')->get();

        return view('FrontPage.seminarPosts', [
            'seminarPost'   => $seminarPost
        ]);
    }

    public function seminarPost(Request $request, $id)
    {
        $seminarPost = SeminarPost::where('id',$id)->first();

        if(!$seminarPost){
            abort(404);
        }else{
            return view('FrontPage.seminarPost', [
                'seminarPost'        => $seminarPost,
            ]);
        }

    }

    public function seminarStorys(Request $request)
    {
        $seminarStory = SeminarStory::orderBy('sort_idx', 'asc')->get();

        return view('FrontPage.seminarStorys', [
            'seminarStory'   => $seminarStory
        ]);
    }

    public function seminarStory(Request $request, $id)
    {
        $seminarStory = SeminarStory::where('id',$id)->first();

        if(!$seminarStory){
            abort(404);
        }else{
            return view('FrontPage.seminarStory', [
                'seminarStory'        => $seminarStory,
            ]);
        }

    }


}
