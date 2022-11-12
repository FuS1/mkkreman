<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Admin;

class CheckAdminToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( config('env.APP_ENV')!=='testing' ) {
            if( Carbon::parse($request->user()->currentAccessToken()->expired_at)->lt(Carbon::now()) ){
                return response('',401);
            }
    
            $request->user()->currentAccessToken()->update([
                'expired_at'=> Carbon::now()->addSeconds(config('env.TOKEN_EXPIRETIME', 43200))->toDateTimeString()
            ]);
        }

        return $next($request);
    }
}