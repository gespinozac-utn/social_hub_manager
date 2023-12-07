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
            ]);
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
       ]);
    }

    public function create()
    {
       return view('posts.create',['user'=>auth()->user()]);
    }

    public function store(Request $request)
    {
        // save post in the database
        $request->validate([
            'body'=>'required',
            'plataform_id'=>'required',
            'publish_at'=>'required'
        ]);

        $request->publish_at=str_replace('T',' ',$request->publish_at);
        if($request->publish_at <= date(now())){
            // publish the post right now
            // print('Post Publish!');
            $request->post_state_id='1';
        }
        $request->post_state_id='3';

        Post::create([
            'user_id'=>auth()->user()->id,
            'plataform_id'=>$request->plataform_id,
            'post_state_id'=>$request->post_state_id,
            'body'=>$request->body,
            'publish_at'=>$request->publish_at
        ]);
        return redirect('posts');
    }

    protected function verified_post()
    {
        
    }
}
