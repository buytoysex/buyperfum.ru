<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyOption extends Model
{
    protected $filable = ['property_id', 'name', 'name_en'];

    public function property()
    {
        $this->belongsTo(Property::class);
    }

    //TODO: check name and fields
    public function skus()
    {
        return $this->belongsToMany(Sku::class);
    }
}
