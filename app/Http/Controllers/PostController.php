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
                'posts'=>Post::where('user_id',auth()->user()->id)
                    ->where('post_state_id',1)
                    ->get()
                ])
                ->with('Success Log in!');
        }else
        {
            return redirect(route('login'));
        }
    }

    public function show()
    {
       return view('posts.all',[
        'posts'=>Post::where('user_id',auth()->user()->id)
            ->where('post_state_id','<>',1)
            ->get()
        ])
        ->with('Success Log in!'); 
    }

    public function create()
    {
       return view('posts.all',[
        'user'=>auth()->user()
        ])
        ->with('Success Log in!'); 
    }

    public function store()
    {
        // save post in the database
    }

    protected function verified_post()
    {
        
    }
}
