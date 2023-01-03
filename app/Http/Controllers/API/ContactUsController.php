<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Traits\MailTrait;
use App\Models\SystemVariable;

class ContactUsController extends Controller
{

    use MailTrait;

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function mail(Request $request)
    {
        $recipient = SystemVariable::where('field','contact_us_'.$request->type.'_email_recipient')->first();

        if(!$recipient){
            return response([],200);
        }

        try {
            $recipient = json_decode($recipient->value);
        } catch (\Throwable $th) {
            return response([],200);
        }

        $this->sendMail([
            'bladeName' => 'mail.contact_us',
            'title'     => '【詢問表單】 來自-'.$request->name,
            'to'        => $recipient,
            'data'      => [
                'formData'  => $request,
            ],
            'attach'=>[]
        ]);
        
        return response([],200);
    }

}
