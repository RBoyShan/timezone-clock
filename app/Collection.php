<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $guarded = [];

    public function student() {
        return $this->belongsTo(
          Product::class,
          'product_id',
          'id'
        );
    }
}
