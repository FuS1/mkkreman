<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\Banner;

class BannerController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $banner_query = Banner::query();
        
        $banners = $this->baseService->applyFilterQuery($banner_query, $request->all());

        return response($banners,200);
    }

    public function saveBanner(Request $request)
    {

        if(!isset($request->file)){
            throw new ErrorException('缺少電腦版圖檔'); 
        }else if(!isset($request->mobile_file)){
            throw new ErrorException('缺少手機版圖檔'); 
        }

        $fileInfo = [
            'filePath' => 'banner',
            'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
        ];
        
        $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));

        $mobileFileInfo = [
            'filePath' => 'banner',
            'fileName' => Str::orderedUuid().".".($request->mobile_file->getClientOriginalExtension()==='' ? $request->mobile_file->clientExtension():$request->mobile_file->getClientOriginalExtension()),
        ];
        
        $uploadResult = Storage::disk('public')->put($mobileFileInfo['filePath'].'/'.$mobileFileInfo['fileName'], file_get_contents($request->mobile_file));

        $banner = Banner::create([
            'title'     => $request->title ?? null,
            'file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'],
            'mobile_file_path' => $mobileFileInfo['filePath'] .'/'.$mobileFileInfo['fileName'],
            'url'       => $request->url ?? null
        ]);

        $this->resetSortIdx();

        return response($banner->refresh(),200);
    }

    public function deleteBanner(Request $request)
    {
        Banner::where('id',$request->banner_id)->delete();
        $this->resetSortIdx();
    }

    public function changeBannerSort(Request $request)
    {
        
        $banner = Banner::where('id',$request->banner_id)->first();
        
        
        $afterSortIdx = $banner->sort_idx;
        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        Banner::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $banner->sort_idx
        ]);

        $banner->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($banner->refresh(),200);
    }

    // 將每一個Banner取出來重新排序
    private function resetSortIdx()
    {
        $banners = Banner::orderBy('sort_idx','asc')->get();
        $banners->each(function($banner, $key){
            $banner->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
