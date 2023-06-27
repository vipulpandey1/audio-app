<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ="products";
    protected $fillable  = [
        "category_id","sub_category_id","name","url","meta","title","author","narrator","genre","duration","description","desktop_image","mobile_image","slider_desktop_image","mobile_slider_image","status","f_status"	

    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function productMedia(){
        return $this->hasMany(ProductMedia::class);
    }

    public function audios(){
        return $this->hasMany(ProductMedia::class,'product_id');
    }
    
     public function reading(){
        return $this->hasMany(ReadingList::class,'product_id');
    }
    
    public function audio_duration(){
        return $this->hasMany(ProductMediaDuration::class);
    }
    public function playlist(){
        return $this->hasMany(RecentSave::class,'product_id');
    }
    
    
    // public function countLike(){
    //     return  $this->hasManyThrough(LikeSave::Class,ProductMedia::class,"product_id",'media_id',"id");
    // }
}
