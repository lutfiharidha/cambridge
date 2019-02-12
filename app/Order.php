<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'address', 'telp','whatsapp','package'
    ];
    public function get_package(){
        return $this->belongsTo('App\\Package', 'package', 'id');
    }
}
