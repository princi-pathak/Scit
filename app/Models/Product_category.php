<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    use HasFactory;
    protected $fillable = ['home_id','name', 'cat_id', 'status'];
    public function parent()
    {
        return $this->belongsTo(Product_category::class, 'cat_id');
    }

    public function children()
    {
        return $this->hasMany(Product_category::class, 'cat_id');
    }

    public function getFullCategoryAttribute()
    {
        $category = $this;
        $names = [];
        $check = [];

        while ($category) {
            if (in_array($category->id, $check)) {
                break;
            }

            $check[] = $category->id;
            array_unshift($names, $category->name);
            $category = $category->parent;
        }


        return implode(' >> ', $names);
    }
    public function getChildrenCountAttribute()
    {
        return $this->children()->count();
    }
}
