<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
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

    public function getSeminars(Request $request)
    {
        $seminars = Seminar::where('ended_at','>=',Carbon::now()->toDateTimeString())->where('qop','>',0)->get();

        return response($seminars,200);
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
        $seminar = Seminar::where('id',$request->seminar_id)->first();
        $seminar->seminarParticipant()->delete();
        $seminar->delete();
    }
}
