<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\TwilioController;


class TwoFactorController extends Controller
{
    public function show(Request $request)
    {
        return view('2fa');
    }

    // public function verify(Request $request)
    // {
        
    // }

    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required'
        ]);
        try{
            $verification = (new TwilioController())->verify_otp(auth()->user()->phone,$request->code);
        }catch(\Exception $e){
            return redirect()->back()->withErrors(["code"=>"Invalid code or expired, logout and log in again"])->withInput();
        }
        if($verification->status==='approved'){
            session()->put('user_2fa',auth()->user()->id);
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(["code"=>"Invalid code."])->withInput();
    }

    // public function verify(Request $request)
    // {
    //     $request->validate([
    //         'one_time_password' => 'required|string',
    //     ]);

    //     $user_id = $request->session()->get('2fa:user:id');
    //     $remember = $request->session()->get('2fa:auth:remember', false);
    //     $attempt = $request->session()->get('2fa:auth:attempt', false);

    //     if (!$user_id || !$attempt) {
    //         return redirect()->route('login');
    //     }

    //     $user = User::find($user_id);

    //     if (!$user || !$user->remember_token) {
    //         return redirect()->route('login');
    //     }

    //     $google2fa = new Google2FA();
    //     $otp_secret = $user->google2fa_secret;

    //     if (!$google2fa->verifyKey($otp_secret, $request->one_time_password)) {
    //         throw ValidationException::withMessages([
    //         'one_time_password' => [__('The one time password is invalid.')],
    //         ]);
    //     }

    //     $guard = config('auth.defaults.guard');
    //     $credentials = [$user->getAuthIdentifierName() => $user->getAuthIdentifier(), 'password' => $user->getAuthPassword()];
        
    //     if ($remember) {
    //         $guard = config('auth.defaults.remember_me_guard', $guard);
    //     }
        
    //     if ($attempt) {
    //         $guard = config('auth.defaults.attempt_guard', $guard);
    //     }
        
    //     if (Auth::guard($guard)->attempt($credentials, $remember)) {
    //         $request->session()->remove('2fa:user:id');
    //         $request->session()->remove('2fa:auth:remember');
    //         $request->session()->remove('2fa:auth:attempt');
        
    //         return redirect()->intended('/');
    //     }
        
    //     return redirect()->route('login')->withErrors([
    //         'password' => __('The provided credentials are incorrect.'),
    //     ]);
    // }
}
