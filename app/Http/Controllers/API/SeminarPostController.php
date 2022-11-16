<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\SeminarPost;

class SeminarPostController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $seminarPost_query = SeminarPost::query();
        
        $seminarPosts = $this->baseService->applyFilterQuery($seminarPost_query, $request->all());

        return response($seminarPosts,200);
    }

    public function getSeminarPost(Request $request)
    {
        $seminarPost = SeminarPost::where('id',$request->seminar_post_id)->first();

        return response($seminarPost,200);
    }

    public function saveSeminarPost(Request $request)
    {
        $seminarPost = SeminarPost::updateOrCreate(
        [
            'id'        => !$request->seminar_post_id || $request->seminar_post_id==='null' ? null : $request->seminar_post_id , 
        ],[
            'title'     => $request->title ?? null,          
            'content'   => $request->content ?? null,      
        ]);

        $this->resetSortIdx();
        
        // 如果有上傳新的檔案，則更新
        if( !empty($request->file) ){

            $fileInfo = [
                'filePath' => 'seminar/post',
                'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));    

            $seminarPost->update([
                'file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);
        }

        return response($seminarPost->refresh(),200);
    }

    public function deleteSeminarPost(Request $request)
    {
        SeminarPost::where('id',$request->seminar_post_id)->delete();
        $this->resetSortIdx();
    }
    
    public function changeSeminarPostSort(Request $request)
    {
        
        $seminarPost = SeminarPost::where('id',$request->seminar_post_id)->first();
        
        $afterSortIdx = $seminarPost->sort_idx;

        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        SeminarPost::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $seminarPost->sort_idx
        ]);

        $seminarPost->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($seminarPost->refresh(),200);
    }

    // 將每一個SeminarPost取出來重新排序
    private function resetSortIdx()
    {
        $seminarPosts = SeminarPost::orderBy('sort_idx','asc')->get();
        $seminarPosts->each(function($seminarPost, $key){
            $seminarPost->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
