<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        
        $attributes['phone'] = '+506'.$attributes['phone'];

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success','Your Account has been created!');
    }
}
