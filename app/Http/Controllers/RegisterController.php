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
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|numeric|digits:8|unique:users,phone',
            'password' => 'required|max:255|min:7'
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success','Your Account has been created!');
    }
}
