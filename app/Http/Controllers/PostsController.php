<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function create()
    {
    	$this->data['tags'] = Tag::all();
    	$this->data['categories'] = Category::all();
    	return view('posts.create',$this->data);
    }
    public function store(Request $request)
    {
    	 $data = $request->validate([
    	 	'title'=> 'required',
    	 	'thumbnail' => '',
    	 	'body' => 'required|min:20',
    	 	'cat_id' => 'required',
    	 	
    	 	]);

    	 $post = new Post();

       $ext = $request->thumbnail->extension();
       $image = rand(). '.'.$ext;
       $test = $request->thumbnail->move(public_path('posts_images'),$image);
       $post->thumbnail = $image;

       $post->title = $request->input('title');
       $post->body  = $request->input('body');
       $post->cat_id = $request->input('cat_id');
       $post->user_id = Auth::id();
       $post->status = false;
       $post->save();

        $tag = $request->tag_id;
        $tags = Tag::find($tag);
        $post->tags()->attach($tags);
        return back()->with('message','Post Added Succcessfully');
    }
    public function edit($id)
    {
    	$this->data['post'] = Post::find($id);
    	$this->data['tags'] = Tag::all();
    	$this->data['categories'] = Category::all();
    	return view('posts.edit',$this->data);
    }
    public function update(Request $request,$id)
    {
    	$data = $request->validate([
    	 	'title'=> 'required',
    	 	'thumbnail' => '',
    	 	'body' => 'required|min:20',
    	 	'cat_id' => 'required',
    	 	
    	 	]);

    	

       $ext = $request->thumbnail->extension();
       $image = rand(). '.'.$ext;
       $test = $request->thumbnail->move(public_path('posts_images'),$image);
       $post = Post::find($id);
       $post->thumbnail = $image;

       $post->title = $request->input('title');
       $post->body  = $request->input('body');
       $post->cat_id = $request->input('cat_id');
       $post->user_id = Auth::id();
       $post->status = false;
       $post->save();
         $tag = $request->tag_id;
        $tags = Tag::find($tag);
        $post->tags()->sync($tags);
        return back()->with('message','Post Update Succcessfully');

    }
}
