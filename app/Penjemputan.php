<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjemputan extends Model
{
    protected $fillable = ['name', 'nomer', 'keterangan', 'alamat'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
