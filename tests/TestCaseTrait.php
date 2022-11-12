<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use Carbon\Carbon;
use Database\Seeders\WebUserTableSeeder;
use Database\Seeders\InsuranceTypeTableSeeder;
use Database\Seeders\InsuranceItemTableSeeder;
use Database\Seeders\CompanyTableSeeder;
use Database\Seeders\SourceTableSeeder;
use Database\Seeders\SourceCompanyTableSeeder;
use Database\Seeders\SaleTableSeeder;
use App\Models\WebUser;

trait TestCaseTrait
{

    /**
     * 設置系統基礎資料
     *
     */
    protected function initBaseData()
    {
        // 根據seeder加入固定資料
        $this->seed([
            WebUserTableSeeder::class,
            InsuranceTypeTableSeeder::class,
            InsuranceItemTableSeeder::class,
            CompanyTableSeeder::class,
            SourceTableSeeder::class,
            SourceCompanyTableSeeder::class,
            SaleTableSeeder::class
        ]);
    }

    /**
     * 設置測試時使用的身份人員
     *
     */
    protected function initFakeUser()
    {
        $this->fakeUser = WebUser::first();
        $this->be($this->fakeUser);
        $this->fakeUser->token = $this->fakeUser->createToken($this->fakeUser->id);

        $this->fakeUser->tokens()->where('id',$this->fakeUser->token->accessToken->id)->update([
            'expired_at' => Carbon::now()->addSeconds(config('env.TOKEN_EXPIRETIME', 43200))->toDateTimeString()
        ]);

    }
}