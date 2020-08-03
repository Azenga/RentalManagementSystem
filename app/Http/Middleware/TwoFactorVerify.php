<?php

namespace App\Http\Middleware;

use Closure;
use App\Notifications\VerifyAccount;

class TwoFactorVerify
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
        if($request->user()->otp_token_expiry > now()){
            return $next($request);
        }

        $request->user()->update(['otp_token' => mt_rand(1000000, 9999999)]);

        $request->user()->notify(new VerifyAccount($request->user()));

        return redirect('/2fa/verify');
    }
}
