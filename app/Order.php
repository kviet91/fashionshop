<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';

    public function product(){
        $this->hasMany('App\Product', 'product_id', 'id');
    }

    public function transaction(){
        $this->belongsTo('App\Transaction', 'transaction_id', 'id');
    }
}
