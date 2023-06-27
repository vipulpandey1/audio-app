<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = "subcategories";
    protected $fillable = ["name","category_id","meta","title","description","show_home","desktop_image","mobile_image","slider_desktop_image","mobile_slider_image","status"];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function product(){
        return $this->hasMany(Product::class,'sub_category_id');
    }
    
    public function slider()
    {
        return $this->hasManyThrough(Slider::class,Category::class,'id',"category_id","category_id");
    }
    
}
