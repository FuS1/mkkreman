<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\Seminar;

class SeminarController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $seminar_query = Seminar::query();
        
        $seminars = $this->baseService->applyFilterQuery($seminar_query, $request->all());

        return response($seminars,200);
    }

    public function getSeminar(Request $request)
    {
        $seminar = Seminar::where('id',$request->seminar_id)->first();

        return response($seminar,200);
    }

    public function saveSeminar(Request $request)
    {
        $seminar = Seminar::updateOrCreate(
        [
            'id'         => $request->seminar_id ?? null,             
        ],[
            'started_at' => $request->started_at ?? null,
            'ended_at'   => $request->ended_at ?? null,
            'title'      => $request->title ?? null,             
            'address'    => $request->address ?? null,             
            'qop'        => $request->qop ?? 0,             
        ]);

        return response($seminar->refresh(),200);
    }

    public function deleteSeminar(Request $request)
    {
        Seminar::where('id',$request->seminar_id)->delete();
        //$this->resetSortIdx();
    }

    public function changeSeminarSort(Request $request)
    {
        
        $seminar = Seminar::where('id',$request->seminar_id)->first();
        
        
        $afterSortIdx = $seminar->sort_idx;
        if($request->action == 'forward'){
            $afterSortIdx -= 1 ;
        }else if($request->action =='backward'){
            $afterSortIdx += 1 ;
        }

        Seminar::where('sort_idx',$afterSortIdx)->update([
            'sort_idx' => $seminar->sort_idx
        ]);

        $seminar->update([
            'sort_idx' => $afterSortIdx
        ]);

        $this->resetSortIdx();

        return response($seminar->refresh(),200);
    }

    // 將每一個Seminar取出來重新排序
    private function resetSortIdx()
    {
        $seminars = Seminar::orderBy('sort_idx','asc')->get();
        $seminars->each(function($seminar, $key){
            $seminar->update([
                'sort_idx'=>$key+1
            ]);
        });
    }

}
