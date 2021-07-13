<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Friendship;
use Illuminate\Support\Facades\Auth;
class CommonUsersController extends Controller
{
    public function profile($id)
    {
    	

    	 
    						
    	 $this->data['friends'] = Friendship::select('*')
    	 ->where('accept_id','=', Auth::id())
    	 ->where('status',1)
    	 ->where('reject',0)
    	 ->get();
         
    	 $this->data['users'] = User::all();						
    	$this->data['posts'] = Post::where('user_id',$id)->latest()->get();
    	$this->data['user'] = User::find($id);
    	return view('users.commonusers',$this->data);
    }
}
