<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostState;

class PostApiController extends Controller
{
    public function queue()
    {
        $this->updatePostState('In Queue');
    }

    public function waiting()
    {
        $this->updatePostState('Waiting');
    }

    protected function updatePostState($state)
    {
        $updatedState = $state==='Waiting' ? 'In Queue' : 'Published';
        $published = PostState::where('name',$updatedState)->first();
        $posts = $this->searchState($state);
        foreach ($posts as $post) {
            Post::where('id',$post->id)
                ->update([
                    'updated_at' => date(now()), 
                    'post_state_id' => $published->id 
                ]);
        }
        return response()->json(['Message'=>'Success'], 200);
    }

    protected function searchState($state)
    {
        $postState = PostState::where('name',$state)->first();
        $date = $state==='Waiting' ? date('Y-m-d').' 23:59:59' : date(now());
        $posts = Post::whereDate('publish_at','<=',$date)
                    ->where('post_state_id','=',$postState->id)
                    ->get();
        return $posts;
    }
}
