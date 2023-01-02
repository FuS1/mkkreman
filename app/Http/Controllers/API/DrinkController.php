<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\Drink;

class DrinkController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $drink_query = Drink::query();
        
        $drinks = $this->baseService->applyFilterQuery($drink_query, $request->all());

        return response($drinks,200);
    }

    public function getDrink(Request $request)
    {
        $drink = Drink::where('id',$request->drink_id)->first();

        return response($drink,200);
    }

    public function saveDrink(Request $request)
    {


        $drink = Drink::updateOrCreate(
        [
            'id'        => !$request->drink_id || $request->drink_id==='null' ? null : $request->drink_id ,             
        ],[
            'title'             => $request->title ?? null,
            'short_description' => $request->short_description ?? null,
            // 'content'           => $request->content ?? null,
        ]);

        // 如果有上傳新的檔案，則更新
        if( !empty($request->file) ){

            $fileInfo = [
                'filePath' => 'drink',
                'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));    

            $drink->update([
                'file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);
        }

        $this->resetSortIdx();
        
        return response($drink->refresh(),200);

    }

    public function deleteDrink(Request $request)
    {
        Drink::where('id',$request->drink_id)->delete();
        $this->resetSortIdx();
    }

    public function changeDrinkSort(Request $request)
    {
        
        $drink = Drink::where('id',$request->drink_id)->first();
        
        $afterSortIdx = $drink->sort_idx;
        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        Drink::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $drink->sort_idx
        ]);

        $drink->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($drink->refresh(),200);
    }

    // 將每一個Drink取出來重新排序
    private function resetSortIdx()
    {
        $drinks = Drink::orderBy('sort_idx','asc')->get();
        $drinks->each(function($drink, $key){
            $drink->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
