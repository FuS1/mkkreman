<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Desensitization\Filter as Desensitization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        if(config('env.APP_ENV') ==='local'){
            DB::listen(function ($query) {
                Log::channel('sql')
                    ->info(
                        'Query Time : '. $query->time .'ms '.Str::replaceArray('?', $query->bindings, $query->sql)
                    );
            });
        }
        
        Schema::defaultStringLength(191);
        
        Desensitization::config([
            'include' => function($uri) { return true; },
            'roles' => collect(config('desensitization.roles'))->map(function($item, $key){
                return function(&$string) use ($item) { $string = Str::desensite($string,$item); };
            })
        ]);

    }
}
