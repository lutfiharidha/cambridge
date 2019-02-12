<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storie extends Model
{
    protected $fillable = [
        'name', 'post', 'image','status','class','year',
    ];
}
