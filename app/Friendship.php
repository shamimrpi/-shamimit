<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;

class Friendship extends Model
{
    protected $fillable = ['accept_id','sent_id'];

 
    public function user()
    {
    	
    	return $this->belongsTo(User::class,'sent_id');
    }
    public function unFriend()
    {
        return $this->friend()->where('accept_id',Auth::id())->exists();
    }
}
