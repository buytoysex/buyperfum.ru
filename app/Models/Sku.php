<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $filable = ['product_id', 'count', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //TODO: check name and fields
    public function skus()
    {
        return $this->belongsToMany(PropertyOption::class);
    }
}
