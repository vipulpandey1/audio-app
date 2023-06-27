<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsMedia extends Model
{
    use HasFactory;
    protected $table = "ads_popup";
    protected $fillable = [
        'product_id',
        "title",
		'media_file',
		'pro_media_id',
		'ip_address',
        'click',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id',"id");
    }

    public function productMedia(){
        return $this->hasOne(ProductMedia::class,'pro_media_id','id');
    }
}
