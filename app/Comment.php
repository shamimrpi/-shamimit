<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use App\User;

class Comment extends Model
{
	protected $fillable = ['user_id','body','post_id'];
    
    public function likes()
    {
    	return $this->morphMany(Like::class,'likeable');
    }
    public function user()
    {
    	
    	return $this->belongsTo(User::class);
    }
}
