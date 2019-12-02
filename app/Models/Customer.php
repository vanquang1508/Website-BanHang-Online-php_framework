<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $guarded = ['id'];
    protected $timestamp = true;
    public function order(){
        return $this->hasMany('App\Models\Order');
    }
    public function User(){
        return $this->belongsTo('App\User','idUser','id');
    }
}
