<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

class Like extends Model
{
    protected $fillable = ['user_id'];

    public function likeable()
    {
    	return $this->morphTo();
    }
     public function user()
    {
    	return $this->belongsTo(User::class);
    }
     public function comments()
    {
    	return $this->morphMany(Comment::class,'likeable');
    }
}
