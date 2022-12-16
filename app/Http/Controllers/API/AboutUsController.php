<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\AboutUsPerson;

class AboutUsController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function personTabulator(Request $request)
    {
        $aboutUsPerson_query = AboutUsPerson::query();
        
        $aboutUsPersons = $this->baseService->applyFilterQuery($aboutUsPerson_query, $request->all());

        return response($aboutUsPersons,200);
    }

    public function getAboutUsPerson(Request $request)
    {
        $aboutUsPerson = AboutUsPerson::where('id',$request->about_us_person_id)->first();

        return response($aboutUsPerson,200);
    }

    public function saveAboutUsPerson(Request $request)
    {

        $aboutUsPerson = AboutUsPerson::updateOrCreate(
        [
            'id'        => !$request->about_us_person_id || $request->about_us_person_id==='null' ? null : $request->about_us_person_id ,             
        ],[
            'title'             => $request->title ?? null,
            'slogan'            => $request->slogan ?? null,
            'short_description' => $request->short_description ?? null,
        ]);

        // 如果有上傳新的檔案，則更新
        if( !empty($request->file) ){

            $fileInfo = [
                'filePath' => 'about_us/person',
                'fileName' => Str::orderedUuid().".".($request->file->getClientOriginalExtension()==='' ? $request->file->clientExtension():$request->file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->file));    

            $aboutUsPerson->update([
                'file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);
        }

        $this->resetSortIdx();

        return response($aboutUsPerson->refresh(),200);
    }

    public function deleteAboutUsPerson(Request $request)
    {
        AboutUsPerson::where('id',$request->about_us_person_id)->delete();
        $this->resetSortIdx();
    }

    public function changeAboutUsPersonSort(Request $request)
    {
        
        $aboutUsPerson = AboutUsPerson::where('id',$request->about_us_person_id)->first();
        
        $afterSortIdx = $aboutUsPerson->sort_idx;
        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        AboutUsPerson::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $aboutUsPerson->sort_idx
        ]);

        $aboutUsPerson->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($aboutUsPerson->refresh(),200);
    }

    // 將每一個aboutUsPerson取出來重新排序
    private function resetSortIdx()
    {
        $aboutUsPersons = AboutUsPerson::orderBy('sort_idx','asc')->get();
        $aboutUsPersons->each(function($aboutUsPerson, $key){
            $aboutUsPerson->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
