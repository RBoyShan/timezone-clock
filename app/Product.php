<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'manufacturer', 'image', 'price', 'count', 'collection_id'
    ];

    public function collection() {
        return $this->belongsTo(
            Collection::class,
            'collection_id',
            'id'
        );
    }
}
