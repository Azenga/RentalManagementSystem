<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckTwoFactorRequest;

class TwoFactorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showTwoFactorForm()
    {
        return view('auth.custom.2fa');
    }

    public function verifyTwoFactor(CheckTwoFactorRequest $request)
    {
        if($request->input('otp_token') == $request->user()->otp_token){

            $request->user()->update(['otp_token_expiry' => now()->addMinutes(2)]);

            return redirect()->route('roles.index');
        }else{
            return back()->with('message', 'Incorect code');
        }
    }
}
