<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        if(auth()->check())
        {
            return view('admin.posts.index',[
                'posts'=>Post::where('user_id',auth()->user()->id)->get()
            ])
                ->with('Success Log in!');
        }else
        {
            return redirect(route('login'));
        }
    }

    public function show()
    {
        
    }

    protected function verified_post()
    {
        
    }
}
