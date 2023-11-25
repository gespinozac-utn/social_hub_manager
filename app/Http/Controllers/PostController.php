<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        if(auth())
        {
            return view('components.layout')->with('Success Log in!');
        }else
        {
            return redirect('/login');
        }
    }

    public function show()
    {
        
    }

    protected function verified_post()
    {
        
    }
}
