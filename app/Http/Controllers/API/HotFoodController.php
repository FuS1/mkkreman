<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\HotFood;

class HotFoodController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $hotfood_query = HotFood::query();
        
        $hotfoods = $this->baseService->applyFilterQuery($hotfood_query, $request->all());

        return response($hotfoods,200);
    }

    public function getHotFood(Request $request)
    {
        $hotfood = HotFood::where('id',$request->hotfood_id)->first();

        return response($hotfood,200);
    }

    public function saveHotFood(Request $request)
    {


        $hotfood = HotFood::updateOrCreate(
        [
            'id'        => !$request->hotfood_id || $request->hotfood_id==='null' ? null : $request->hotfood_id ,             
        ],[
            'title'             => $request->title ?? null,
            'short_description' => $request->short_description ?? null,
            // 'content'           => $request->content ?? null,
        ]);

        // 如果有上傳新的檔案，則更新
        if( !empty($request->file) ){

            $fileInfo = [
                'filePath' => 'hothotfood',
                'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));    

            $hotfood->update([
                'file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);
        }

        $this->resetSortIdx();
        
        return response($hotfood->refresh(),200);

    }

    public function deleteHotFood(Request $request)
    {
        HotFood::where('id',$request->hotfood_id)->delete();
        $this->resetSortIdx();
    }

    public function changeHotFoodSort(Request $request)
    {
        
        $hotfood = HotFood::where('id',$request->hotfood_id)->first();
        
        $afterSortIdx = $hotfood->sort_idx;
        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        HotFood::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $hotfood->sort_idx
        ]);

        $hotfood->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($hotfood->refresh(),200);
    }

    // 將每一個HotFood取出來重新排序
    private function resetSortIdx()
    {
        $hotfoods = HotFood::orderBy('sort_idx','asc')->get();
        $hotfoods->each(function($hotfood, $key){
            $hotfood->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
