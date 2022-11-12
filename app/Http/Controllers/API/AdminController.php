<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;

use App\Services\BaseService;
use Browser;
use Carbon\Carbon;
use App\Models\Admin;

class AdminController extends Controller
{

    public function __construct(
        BaseService $baseService
    ) {
        $this->baseService = $baseService;
    }

    public function login(Request $request)
    {


        $admin = Admin::where([
            'account'   => $request->account,
            'password'  => Hash::make($request->password)
        ])->first();

        if (! $admin) {
            return response(array(
                "ERR_CODE"=>__LINE__.":"."WRONG_ACCOUNT_OR_PASSWORD",
                "ERR_MSG"=>"帳號或密碼錯誤",
            ),400); 
        }

        $token = $admin->createToken($account);
        
        $admin->tokens()->where('id',$token->accessToken->id)->update([
            'platform'   => Browser::platformName(),
            'deviceType' => Browser::deviceType(),
            'device'     => (Browser::deviceFamily()??'') . " " .(Browser::deviceModel()??'') ." ".(Browser::mobileGrade()??''),
            'browser'    => Browser::browserName(),
            'expired_at' => Carbon::now()->addSeconds(config('env.TOKEN_EXPIRETIME', 43200))->toDateTimeString()
        ]);
        
        return response($token,200);
    }

}
