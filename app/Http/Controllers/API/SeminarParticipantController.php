<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\SeminarParticipant;

class SeminarParticipantController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function tabulator(Request $request)
    {
        $seminar_query = SeminarParticipant::query();
        
        $seminarParticipants = $this->baseService->applyFilterQuery($seminar_query, $request->all());

        return response($seminarParticipants,200);
    }

    public function getSeminarParticipant(Request $request)
    {
        $seminarParticipant = SeminarParticipant::where('id',$request->seminar_participant_id)->first();

        return response($seminarParticipant,200);
    }

    public function saveSeminarParticipant(Request $request)
    {
        $seminarParticipant = SeminarParticipant::updateOrCreate(
        [
            'id'            => $request->seminar_participant_id ?? null,
        ],[
            'seminar_id'    => $request->seminar_id ?? null,
            'name'          => $request->name ?? null,
            'gender'        => $request->gender ?? null,
            'age_range'     => $request->age_range ?? null,
            'phone_number'  => $request->phone_number ?? null,
            'contact_number'=> $request->contact_number ?? null,
            'contact_time'  => $request->contact_time ?? null,
            'receive_type'  => $request->receive_type ?? null,
            'receive_detail'=> $request->receive_detail ?? null,
            'amount'        => $request->amount ?? 1,
            'memo'          => $request->memo ?? null,
            'is_check'      => $request->is_check ?? 0,
        ]);

        return response($seminarParticipant->refresh(),200);
    }

    public function deleteSeminarParticipant(Request $request)
    {
        SeminarParticipant::where('id',$request->seminar_participant_id)->delete();
    }
     
}
