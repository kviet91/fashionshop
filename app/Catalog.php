<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    public $timestamps = true;

    public function catalog_child()
    {
       return $this->hasMany(Catalog::class, 'parent_catalog_id', 'id');
    }

    public function catalog_parent()
    {
       return $this->belongsTo(Catalog::class, 'parent_catalog_id', 'id');
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
