<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\SeminarStory;

class SeminarStoryController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $seminarStory_query = SeminarStory::query();
        
        $seminarStorys = $this->baseService->applyFilterQuery($seminarStory_query, $request->all());

        return response($seminarStorys,200);
    }

    public function getSeminarStory(Request $request)
    {
        $seminarStory = SeminarStory::where('id',$request->seminar_story_id)->first();

        return response($seminarStory,200);
    }

    public function saveSeminarStory(Request $request)
    {
        $seminarStory = SeminarStory::updateOrCreate(
        [
            'id'          => $request->seminar_story_id ?? null,             
        ],[
            'title'             => $request->title              ?? null,     
            'short_description' => $request->short_description  ?? null,     
            'show_in_index'     => $request->show_in_index      ?? 0,  
            'content'           => $request->content            ?? null,    
        ]);

        $this->resetSortIdx();
        
        // 如果有上傳新的檔案，則更新
        if( !empty($request->file) ){

            $fileInfo = [
                'filePath' => 'seminar/story',
                'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));    

            $seminarStory->update([
                'file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);
        }

        // 如果有上傳新的檔案，則更新
        if( !empty($request->banner_file) ){

            $fileInfo = [
                'filePath' => 'seminar/story',
                'fileName' => Str::orderedUuid().".".($request->banner_file->getClientOriginalExtension()==='' ? $request->banner_file->clientExtension():$request->banner_file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->banner_file));    

            $seminarStory->update([
                'banner_file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);
        }
        
        return response($seminarStory->refresh(),200);
    }

    public function deleteSeminarStory(Request $request)
    {
        SeminarStory::where('id',$request->seminar_story_id)->delete();
        $this->resetSortIdx();
    }
    
    public function changeSeminarStorySort(Request $request)
    {
        
        $seminarStory = SeminarStory::where('id',$request->seminar_story_id)->first();
        
        $afterSortIdx = $seminarStory->sort_idx;

        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        SeminarStory::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $seminarStory->sort_idx
        ]);

        $seminarStory->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($seminarStory->refresh(),200);
    }

    // 將每一個SeminarStory取出來重新排序
    private function resetSortIdx()
    {
        $seminarStorys = SeminarStory::orderBy('sort_idx','asc')->get();
        $seminarStorys->each(function($seminarStory, $key){
            $seminarStory->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
