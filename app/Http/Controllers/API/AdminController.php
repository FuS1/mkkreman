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

    public function tabulator(Request $request)
    {
        $admin_query = Admin::query();
        
        $admins = $this->baseService->applyFilterQuery($admin_query, $request->all());

        // account於Model預設為隱藏，需另外設為顯示
        $admins->through(function($admin){
            $admin->makeVisible(['account']);
            return $admin;
        });

        return response($admins,200);
    }

    public function saveAdmin(Request $request)
    {
        $password_new = $this->generateRandomString(8);
       
        $admin = Admin::create([
            'name'      => $request->name ?? null,
            'account'   => $request->account ?? null,
            'password'  => Hash::make($password_new) 
        ]);

        return response([
            "password" => $password_new,
        ],200);
    }

    public function deleteAdmin(Request $request)
    {
        Admin::where('id',$request->admin_id)->delete();
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

    public function changePassword(Request $request)
    {

        if ( !Hash::check($request->password,$request->user()->password) ) {
            throw new ErrorException('原密碼錯誤'); 
        }

        $request->user()->update([
            'password' => Hash::make($request->password_new) 
        ]);

    }

    public function resetPassword(Request $request)
    {
        $admin = Admin::where('id',$request->admin_id)->first();
        $password_new = $this->generateRandomString(8);

        $admin->update([
            'password' => Hash::make($password_new) 
        ]);

        return response([
            "password" => $password_new,
        ],200);
    }

    /*隨機產生亂數*/
    private static function generateRandomString($length = 10) {
        //$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters = '23456789abcdefghkmnprstuvwxyzABCDEFGHJKMNPRSTUVWXYZ'; //去除不易辨識字串
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    } 

}
