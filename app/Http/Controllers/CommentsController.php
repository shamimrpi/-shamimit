<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentsController extends Controller
{
    public function commentStore(Request $request,$id)
    {
    	$comment = new Comment();
    	$comment->user_id = Auth::id();
    	$comment->post_id = $id;
    	$comment->body = $request->body;
    	$comment->save();
    	return back()->with('message','Comment Added Successfully');
    }

    
}
