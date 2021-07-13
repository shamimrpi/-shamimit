<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Friendship;
use Illuminate\Support\Facades\Auth;
use App\User;
class ProfilesController extends Controller
{
    public function index()
    {
    	 $this->data['friends'] = Friendship::select('*')
    	 ->where('accept_id','=', Auth::id())
    	 ->where('status',1)
    	 ->where('reject',0)
    	 ->get();
    	 						
    	$this->data['users'] = User::all();
    	$this->data['user'] = User::find(Auth::id());
    	$this->data['posts'] = Post::select('*')->latest()->get();
    	return view('users.profile',$this->data);
    }
}
