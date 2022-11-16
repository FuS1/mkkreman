<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\Store;

class StoreController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $store_query = Store::query();
        
        $stores = $this->baseService->applyFilterQuery($store_query, $request->all());

        return response($stores,200);
    }

    public function saveStore(Request $request)
    {

        $fileInfo = [
            'filePath' => 'store',
            'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
        ];
        
        $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));

        $store = Store::create([
            'title'     => $request->title ?? null,
            'city'      => $request->city ?? null,
            'address'   => $request->address ?? null,
            'status'    => $request->status ?? null,
            'file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'],
        ]);

        $this->resetSortIdx();

        return response($store->refresh(),200);
    }

    public function deleteStore(Request $request)
    {
        Store::where('id',$request->store_id)->delete();
        $this->resetSortIdx();
    }

    public function changeStoreSort(Request $request)
    {
        
        $store = Store::where('id',$request->store_id)->first();
        
        
        $afterSortIdx = $store->sort_idx;
        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        Store::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $store->sort_idx
        ]);

        $store->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($store->refresh(),200);
    }

    // 將每一個Store取出來重新排序
    private function resetSortIdx()
    {
        $stores = Store::orderBy('sort_idx','asc')->get();
        $stores->each(function($store, $key){
            $store->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
