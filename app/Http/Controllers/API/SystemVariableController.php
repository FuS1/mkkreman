<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Models\SystemVariable;

class SystemVariableController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function index(Request $request)
    {
        return response(SystemVariable::get(),200);
    }

    public function update(Request $request, $field)
    {

        SystemVariable::find($field)
                        ->update([
                            'value' => $request->value
                        ]);


    }

}
