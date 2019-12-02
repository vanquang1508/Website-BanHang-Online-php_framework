<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = ['id'];
    protected $timestamp = true;
    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }
    public function product()
    {
        return $this->belongsToMany(Product::class,'order_details','order_id','product_id');
    }
}
