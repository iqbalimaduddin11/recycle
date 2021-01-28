<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $fillable = ['name', 'alamat', 'nomer', 'rekening', 'email'];
}
