<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class LikesController extends Controller
{
    public function like(Request $request,$id)
    {
    	$user_id = Auth::id();
    	$post_id = $id;
        $post = Post::find($id);
    	$like = $post->likes()->where('user_id', $id)->first();
    	if($like)
    	{
    		$like->delete();
            return back()->with('message','You have undo disliked this post');
    	}
    	else
    	{
    		$post->likes()->create([
            'user_id' => Auth::id()
            ]);
            return back()->with('message','You have like this post');
    	}
    }
}
