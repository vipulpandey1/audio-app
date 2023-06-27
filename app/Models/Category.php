<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ="categories";
    protected $fillable = ["name","meta","title","description","desktop_image","mobile_image","slider_desktop_image","mobile_slider_image"];

    public function subCate(){
        return $this->hasMany(SubCategory::class);
    }

    public function product(){
        return $this->hasMany(Product::class,'category_id');
    }

    public function slider(){
        return $this->hasMany(Slider::class,'category_id');
    }

}
