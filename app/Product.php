<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'name', 'price', 'discount', 'count', 'status', 'description', 'count_buy', 'img_link', 'img_list', 'views', 'rate', 'catalog_id',
    ];

    public function rate()
    {
        return $this->hasMany(Rate::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class );
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function transactions ()
    {
        return $this->belongsToMany(Transaction::class, 'orders');
    }
}
