<?php

namespace App;
use app\user;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    //
    use SoftDeletes;

    protected $gaurded =['*'];
    
    protected $dates = ['deleted_at'];


     public function user()
    {
    	return $this->belongsTo(user::class);
    }
}

