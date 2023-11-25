<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        if(auth()->attempt($attribute)){
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back!');
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
