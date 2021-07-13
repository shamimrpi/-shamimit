<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use Illuminate\Support\Facades\Auth;
use App\Tag;
class Post extends Model
{
    //

    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function likes()
    {
    	return $this->morphMany(Like::class,'likeable');
    }
     public function likeByCurrentUser()
    {
        return $this->likes()->where('user_id',Auth::id())->exists();
    }
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
     public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tag', 'post_id', 'tag_id');
    }
}
