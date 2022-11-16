<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\SeminarMedia;

class SeminarMediaController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $seminarMedia_query = SeminarMedia::query();
        
        $seminarMedias = $this->baseService->applyFilterQuery($seminarMedia_query, $request->all());

        return response($seminarMedias,200);
    }

    public function getSeminarMedia(Request $request)
    {
        $seminarMedia = SeminarMedia::where('id',$request->seminar_media_id)->first();

        return response($seminarMedia,200);
    }

    public function saveSeminarMedia(Request $request)
    {
        $seminarMedia = SeminarMedia::updateOrCreate(
        [
            'id'          => $request->seminar_media_id ?? null,             
        ],[
            'title'       => $request->title ?? null,          
            'sub_title'   => $request->sub_title ?? null,      
            'link'        => $request->link ?? null,      
        ]);

        $this->resetSortIdx();
        
        // 如果有上傳新的檔案，則更新
        if( !empty($request->file) ){

            $fileInfo = [
                'filePath' => 'seminar/media',
                'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));    

            $seminarMedia->update([
                'file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);
        }

        return response($seminarMedia->refresh(),200);
    }

    public function deleteSeminarMedia(Request $request)
    {
        SeminarMedia::where('id',$request->seminar_media_id)->delete();
        $this->resetSortIdx();
    }
    
    public function changeSeminarMediaSort(Request $request)
    {
        
        $seminarMedia = SeminarMedia::where('id',$request->seminar_media_id)->first();
        
        $afterSortIdx = $seminarMedia->sort_idx;

        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        SeminarMedia::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $seminarMedia->sort_idx
        ]);

        $seminarMedia->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($seminarMedia->refresh(),200);
    }

    // 將每一個SeminarMedia取出來重新排序
    private function resetSortIdx()
    {
        $seminarMedias = SeminarMedia::orderBy('sort_idx','asc')->get();
        $seminarMedias->each(function($seminarMedia, $key){
            $seminarMedia->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
