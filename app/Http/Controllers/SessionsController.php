<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TwilioController;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        $attribute = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $twilio = new TwilioController();

        if(auth()->attempt($attribute)){
            $twilio->get_otp(auth()->user()->phone);
            session()->regenerate();
            // return redirect('/');
            return redirect('2fa');
        }

        return back()
            ->withInput()
            ->withErrors(['email'=>'Your provided credentials could not be verified.']);
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success','Goodbye!');
    }
}
