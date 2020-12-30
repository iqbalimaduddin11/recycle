<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'name', 'nomer', 'avatar', 'alamat'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function user() {

        return $this->belongsTo('App/user', 'user_id', 'id');
    }
}
