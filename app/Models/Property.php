<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $filable = ['name', 'name_en'];

    public function propertyOptions()
    {
        return $this->hasMany(PropertyOption::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
