<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(
          Product::class,
          'product_id',
          'id'
        );
    }

    public function products() {
        return $this->hasMany(
            Product::class,
            'collection_id',
            'id'
        );
    }
}
