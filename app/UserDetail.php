<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'name', 'nomer', 'avatar', 'alamat', 'email', 'password'
    ];

    protected $hidden = [ 'created_at', 'updated_at' ];

    public function user() 
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
