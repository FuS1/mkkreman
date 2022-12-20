<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\News;

class NewsController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $news_query = News::query();
        
        $newses = $this->baseService->applyFilterQuery($news_query, $request->all());

        return response($newses,200);
    }

    public function getNews(Request $request)
    {
        $news = News::where('id',$request->news_id)->first();

        return response($news,200);
    }

    public function saveNews(Request $request)
    {

        $news = News::updateOrCreate(
        [
            'id'        => !$request->news_id || $request->news_id==='null' ? null : $request->news_id ,             
        ],[
            'title'             => $request->title              ?? null,
            'short_description' => $request->short_description  ?? null,
            'is_top'            => $request->is_top             ?? 0,
            'show_in_index'     => $request->show_in_index      ?? 0,
            'started_at'        => $request->started_at         ?? null,
            'ended_at'          => $request->ended_at           ?? null,
            'content'           => $request->content            ?? null,
        ]);

        // 如果有上傳新的檔案，則更新
        if( !empty($request->file) ){

            $fileInfo = [
                'filePath' => 'news',
                'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));    

            $news->update([
                'file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);
        }

        // 如果有上傳新的檔案，則更新
        if( !empty($request->banner_file) ){

            $fileInfo = [
                'filePath' => 'news',
                'fileName' => Str::orderedUuid().".".($request->banner_file->getClientOriginalExtension()==='' ? $request->banner_file->clientExtension():$request->banner_file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->banner_file));    

            $news->update([
                'banner_file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);
        }

        
        return response($news->refresh(),200);
    }

    public function deleteNews(Request $request)
    {
        News::where('id',$request->news_id)->delete();
    }

}
