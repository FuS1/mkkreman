<?php
namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class CollectionMacroServiceProvider extends ServiceProvider 
{

    public function boot()
    {
        Collection::macro('whereYear', function ($column,$year) {
            return $this->filter(function ($value) use ($column,$year) {
                $_v = $value->$column;
                if(gettype($_v) === 'string' && ( strlen($_v) === 10 || strlen($_v) === 19 ) ){
                    $_v = Carbon::parse($_v);
                }
                if( $_v instanceof Carbon ){
                    return $_v->year === intval($year);
                }
                return false;
            });
        });

        Collection::macro('whereMonth', function ($column,$month) {
            return $this->filter(function ($value) use ($column,$month) {
                $_v = $value->$column;
                if(gettype($_v) === 'string' && ( strlen($_v) === 10 || strlen($_v) === 19 ) ){
                    $_v = Carbon::parse($_v);
                }
                if( $_v instanceof Carbon ){
                    return $_v->month === intval($month);
                }
                return false;
            });
        });

        Collection::macro('whereDay', function ($column,$day) {
            return $this->filter(function ($value) use ($column,$day) {
                $_v = $value->$column;
                if(gettype($_v) === 'string' && ( strlen($_v) === 10 || strlen($_v) === 19 ) ){
                    $_v = Carbon::parse($_v);
                }
                if( $_v instanceof Carbon ){
                    return $_v->day === intval($day);
                }
                return false;
            });
        });

        Collection::macro('sumOrSum', function ($columns=[]) {
            $sum = 0;
            $this->each(function($item) use (&$sum,$columns) {
                collect($columns)->each(function($column) use (&$sum,$item){
                    if( isset($item->$column) ){
                        $sum+=$item->$column;
                        return false;
                    }
                });
            });
            return $sum;
        });
        
        Collection::macro('multiSum', function ($columns=[]) {
            $sum = 0;
            foreach ($columns as $column) {
                $sum += $this->sum($column);
            }
            return $sum;
        });
    }

}
