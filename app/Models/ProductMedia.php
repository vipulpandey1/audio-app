<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    use HasFactory;
    protected $table = "product_medias";
    protected $fillable = [
        'product_id',
        "title",
		'media_name',
		'media_path',
		'media_type',
        'duration',
        'popup_status',
        'popup_file'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id',"id");
    }

    public function productDuration(){
        return $this->hasOne(ProductMediaDuration::class,'product_media_id');
    }
    
    public function productAds(){
        return $this->hasOne(AdsMedia::class,'pro_media_id');
    }
    public function countLikes(){
        return $this->hasMany(LikeSave::class,'media_id');
    }
    
    // public function ads(){
    //     return $this->belongsTo(AdsMedia::class,'pro_media_id','id');
    // }
}
