<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\MainFood;

class MainFoodController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $mainfood_query = MainFood::query();
        
        $mainfoods = $this->baseService->applyFilterQuery($mainfood_query, $request->all());

        return response($mainfoods,200);
    }

    public function getMainFood(Request $request)
    {
        $mainfood = MainFood::where('id',$request->mainfood_id)->first();

        return response($mainfood,200);
    }

    public function saveMainFood(Request $request)
    {


        $mainfood = MainFood::updateOrCreate(
        [
            'id'        => !$request->mainfood_id || $request->mainfood_id==='null' ? null : $request->mainfood_id ,             
        ],[
            'title'             => $request->title ?? null,
            'short_description' => $request->short_description ?? null,
            // 'content'           => $request->content ?? null,
        ]);

        // 如果有上傳新的檔案，則更新
        if( !empty($request->file) ){

            $fileInfo = [
                'filePath' => 'mainmainfood',
                'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));    

            $mainfood->update([
                'file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);
        }

        $this->resetSortIdx();
        
        return response($mainfood->refresh(),200);

    }

    public function deleteMainFood(Request $request)
    {
        MainFood::where('id',$request->mainfood_id)->delete();
        $this->resetSortIdx();
    }

    public function changeMainFoodSort(Request $request)
    {
        
        $mainfood = MainFood::where('id',$request->mainfood_id)->first();
        
        $afterSortIdx = $mainfood->sort_idx;
        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        MainFood::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $mainfood->sort_idx
        ]);

        $mainfood->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($mainfood->refresh(),200);
    }

    // 將每一個MainFood取出來重新排序
    private function resetSortIdx()
    {
        $mainfoods = MainFood::orderBy('sort_idx','asc')->get();
        $mainfoods->each(function($mainfood, $key){
            $mainfood->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
