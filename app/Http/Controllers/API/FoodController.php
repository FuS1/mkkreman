<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\Food;

class FoodController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $food_query = Food::query();
        
        $foods = $this->baseService->applyFilterQuery($food_query, $request->all());

        return response($foods,200);
    }

    public function saveFood(Request $request)
    {

        $fileInfo = [
            'filePath' => 'food',
            'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
        ];
        
        $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));

        $food = Food::create([
            'title'         => $request->title ?? null,
            'description'   => $request->description ?? null,
            'file_path'     => $fileInfo['filePath'] .'/'.$fileInfo['fileName'],
        ]);

        $this->resetSortIdx();

        return response($food->refresh(),200);
    }

    public function deleteFood(Request $request)
    {
        Food::where('id',$request->food_id)->delete();
        $this->resetSortIdx();
    }

    public function changeFoodSort(Request $request)
    {
        
        $food = Food::where('id',$request->food_id)->first();
        
        $afterSortIdx = $food->sort_idx;
        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        Food::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $food->sort_idx
        ]);

        $food->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($food->refresh(),200);
    }

    // 將每一個Food取出來重新排序
    private function resetSortIdx()
    {
        $foods = Food::orderBy('sort_idx','asc')->get();
        $foods->each(function($food, $key){
            $food->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
