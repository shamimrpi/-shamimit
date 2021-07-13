<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Friendship;

class FriendsController extends Controller
{
    public function store(Request $request,$id)
    {
    	
    	/*$send_request_id = Auth::id();*/
    	$sent_id = Auth::id();
    	$accept_id = $id;

    	$friend = Friendship::where('sent_id',$sent_id)->where('accept_id',$accept_id)->first();

    	if($friend)
    	{
    		$friend->delete();
    		return back()->with('message','Unfollow Request Successfully');
    	}
    	$friend = Friendship::create([
    		'accept_id' => $accept_id,
    		'sent_id' => $sent_id
    	]);
    	return back()->with('message','follow Request Successfully');

    }
    public function reject($id)
    {
    	$sent_id = Auth::id();
    	$accept_id = $id;

    	$friend = Friendship::where('sent_id',$sent_id)->where('accept_id',$accept_id)->get();

    	if($friend)
    	{
    		$friend->reject = true;
    		$friend->status = false;
    		$friend->save();
    		return back()->with('message',' Friend  Request Reject Successfully');
    	}
    	
    }


}
