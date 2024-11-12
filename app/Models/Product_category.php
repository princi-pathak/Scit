<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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

    public static function saveProductCategoryData(array $data, $productCategoryID = null)
    {
        $data['home_id'] = Auth::user()->home_id;        
        return self::updateOrCreate(['id' => $productCategoryID], $data);
        
    }
    public static function checkproductcategoryname($category_name,$productCategoryID = null)
    {
        $homeId = Auth::user()->home_id;

        // If no product category ID is provided, count categories with the same name
        if (empty($productCategoryID)) {
            return self::where(['home_id' => $homeId, 'name' => $category_name])->count();
        } else {
            // Check for a category with the same name and the provided ID
            $checkName = self::where(['home_id' => $homeId, 'name' => $category_name])
                ->where('id', '!=', $productCategoryID)
                ->first();

            // If a category with the same name exists and it's not the current one, return 1
            if ($checkName) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    public static function changeProductCategoryStatus($productCategoryID,$status)
    {
        $productCategory = self::find($productCategoryID);
        $productCategory->status = $status;
        return $productCategory->save();
    }

    public static function deleteProductCategory(array $productCategoryID)
    {
        return self::whereIn('id', $productCategoryID)->update(['deleted_at' => now()]);
        //$productCategory->deleted_at = date('Y-m-d H:i:s');
         
    }

    public static function getProductCategory($home_id){
        return self::where('status', 1)->where('deleted_at', null)->where('home_id', $home_id)->get();
    }
}
