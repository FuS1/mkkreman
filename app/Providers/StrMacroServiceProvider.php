<?php
namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class StrMacroServiceProvider extends ServiceProvider 
{

    public function boot()
    {
        Str::macro('desensite', function ($string, $type=null) {
            if($string=='' || empty($string)){
                return $string;
            }
            switch ($type) {
                case 'car_plate_number':
                    $string = Str::of($string)->explode('-')->map(function ($_s, $key) {
                        if($key===0){
                            $_s = Str::mask($_s,'*',1, Str::length($_s)-1 );
                        }else{
                            $_s = Str::mask($_s,'*',0,-1);
                        }
                        return $_s;
                    })->join('-');
                    break;
                case 'human_name':
                    $foundCompanyString = null;
                    foreach (['股份有限公司','股份公司','有限公司','公司','企業','集團'] as $key => $companyString) {
                        if( Str::contains($string, $companyString) ){
                            $foundCompanyString = $companyString;
                            break;
                        }
                    }                      
                    if( $foundCompanyString !== null ){
                        $_string = $string;                                          // 和運租車股份有限公司高雄分公司
                        $string  = Str::replace($foundCompanyString, '', $_string);  // 和運租車
                        $string  = Str::mask($string,'*',1,2).$foundCompanyString;   // 和**車高雄分公司 股份有限公司
                    }else{
                        $string  = Str::mask($string,'*',1,-1);
                    }
                    break;
                case 'human_id':
                    switch (Str::length($string)) {
                        case 8:
                            //如果是台灣公司統編
                            $string = Str::mask($string,'*',1,-1);
                            break;
                        case 10:
                        default:
                            //如果是身分證 或 新式居居留證 或其他長度
                            $string = Str::mask($string,'*',3,-3);
                            break;
                    }
                    break;
                case 'phone':
                    $string = Str::mask($string,'*',4,-2);
                    break;
                default:
                    $string = Str::mask($string,'*',2,-2);
                    break;
            }
            return $string;
        });

        Str::macro('numToAlpha', function ($v) {
            $r = '';
            for ($i = 1; $v >= 0 && $i < 10; $i++) {
                $r = chr(0x41 + ($v % pow(26, $i) / pow(26, $i - 1))) . $r;
                $v -= pow(26, $i);
            }
            return $r;
        });

        Str::macro('transformDateToTwDate', function ($date) {
            if($date==null || $date=='' || strlen($date)!=10){
                return null;
            }
            $date = explode("-", $date);
            $date[0] = intval($date[0]) - 1911;
            return implode(".",$date);
        });

        Str::macro('transformTwDateToDate', function ($date) {
            if($date==null || $date=='' || (strlen($date)!=9 && strlen($date)!=8)){
                return null;
            }
            $date = explode(".", $date);
            $date[0] = intval($date[0]) + 1911;
            return implode("-",$date);
        });
    }

}
