<?php

namespace App\Http\Middleware;

use App\CustomerUser;
use Closure;

class CheckVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $customer = CustomerUser::where(['email' => $request->email])->first();

        if($customer){
            if($customer->email_verified_at == null){
                return response()->json([
                    "status" => 406,
                    "message" => "Sorry , this email not verified !" ,
                    "data"  => [],
                ], 406);
            }
        }else{
            return response()->json([
                "status" => 406,
                "message" => "Sorry , there is no user with this email !" ,
                "data"  => [],
            ], 406);
        }
        
        return $next($request);
    }
}
