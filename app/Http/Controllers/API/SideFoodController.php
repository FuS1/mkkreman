<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\SideFood;

class SideFoodController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $sidefood_query = SideFood::query();
        
        $sidefoods = $this->baseService->applyFilterQuery($sidefood_query, $request->all());

        return response($sidefoods,200);
    }

    public function getSideFood(Request $request)
    {
        $sidefood = SideFood::where('id',$request->sidefood_id)->first();

        return response($sidefood,200);
    }

    public function saveSideFood(Request $request)
    {


        $sidefood = SideFood::updateOrCreate(
        [
            'id'        => !$request->sidefood_id || $request->sidefood_id==='null' ? null : $request->sidefood_id ,             
        ],[
            'title'             => $request->title ?? null,
            'short_description' => $request->short_description ?? null,
            // 'content'           => $request->content ?? null,
        ]);

        // 如果有上傳新的檔案，則更新
        if( !empty($request->file) ){

            $fileInfo = [
                'filePath' => 'sidesidefood',
                'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));    

            $sidefood->update([
                'file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);
        }

        $this->resetSortIdx();
        
        return response($sidefood->refresh(),200);

    }

    public function deleteSideFood(Request $request)
    {
        SideFood::where('id',$request->sidefood_id)->delete();
        $this->resetSortIdx();
    }

    public function changeSideFoodSort(Request $request)
    {
        
        $sidefood = SideFood::where('id',$request->sidefood_id)->first();
        
        $afterSortIdx = $sidefood->sort_idx;
        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        SideFood::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $sidefood->sort_idx
        ]);

        $sidefood->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($sidefood->refresh(),200);
    }

    // 將每一個SideFood取出來重新排序
    private function resetSortIdx()
    {
        $sidefoods = SideFood::orderBy('sort_idx','asc')->get();
        $sidefoods->each(function($sidefood, $key){
            $sidefood->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
