<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\ErrorException;
use App\Services\BaseService;
use Browser;
use Crypt;
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
        $admin = Admin::select(['id','name','password'])->where([
            'account'     => $request->account,
            'disabled_at' => null
        ])->first();
        
        if ( !$admin || !Hash::check($request->password,$admin->password) ) {
            throw new ErrorException('帳號或密碼錯誤'); 
        }

        $token = $admin->createToken($request->password.time());
        
        $admin->tokens()->where('id',$token->accessToken->id)->update([
            'platform'   => Browser::platformName(),
            'deviceType' => Browser::deviceType(),
            'device'     => (Browser::deviceFamily()??'') . " " .(Browser::deviceModel()??'') ." ".(Browser::mobileGrade()??''),
            'browser'    => Browser::browserName(),
            'expired_at' => Carbon::now()->addSeconds(config('env.TOKEN_EXPIRETIME', 43200))->toDateTimeString()
        ]);

        $admin->token = $token;

        return response($admin,200);
    }

}
