<?php

namespace App\Models;

use App\Models\Trails\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;
    protected $fillable = ['code', 'name', 'description', 'image', 'name_en', 'description_en'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function children()
    {
        return $this->hasMany(SELF::class, 'parent_id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(SELF::class, 'parent_id');
    }

    public function breadcrumb($code)
    {
        $breadcrumbs = array('/' => 'Секс шоп');
        $breadcrumbs = Category::where('code', $code)->first();
        return $breadcrumbs;
    }
}
