<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PragmaRX\Google2FA\Google2FA;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        // Create the user
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|numeric|digits:8|unique:users,phone',
            'password' => 'required|max:255|min:7'
        ]);
        
        //$attributes['phone'] = '+506'.$attributes['phone'];

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success','Your Account has been created!');
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->uses_two_factor_auth) {
            $google2fa = new Google2FA();

            if ($request->session()->has('2fa_passed')) {
                $request->session()->forget('2fa_passed');
            }

            $request->session()->put('2fa:user:id', $user->id);
            $request->session()->put('2fa:auth:attempt', true);
            $request->session()->put('2fa:auth:remember', $request->has('remember'));

            $otp_secret = $user->google2fa_secret;
            $one_time_password = $google2fa->getCurrentOtp($otp_secret);

            return redirect()->route('2fa')->with('one_time_password', $one_time_password);
        }

        return redirect()->intended($this->redirectPath());
    }
}
