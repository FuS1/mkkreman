<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use App\Traits\MailTrait;

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
        $this->sendMail([
            'bladeName' => 'mail.contact_us',
            'title'     => $request->title ?? '',
            'to'        => ['a271954@gmail.com'],
            'data'      => [
                'formData'  => $request,
            ],
            'attach'=>[]
        ]);
    }

}
