<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ="products";
    protected $fillable  = [
        "category_id","sub_category_id","name","meta","title","description","desktop_image","mobile_image","slider_desktop_image","mobile_slider_image"	

    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
}
