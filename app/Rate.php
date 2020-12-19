<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    //
    protected $table = 'rates';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
