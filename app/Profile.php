<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    
      protected $fillable = [
        'phone', 'f_name', 'm_name','experience','education','user_id','location','note','skill',
    	];
    public function user()
    {
    	
    	return $this->belongsTo(User::class);
    }
}
