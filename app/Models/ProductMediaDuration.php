<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMediaDuration extends Model
{
    use HasFactory;
    protected $table = "product_media_durations";
    protected $fillable = [
        "product_id","product_media_id","user_id","duration_time","end_time","homestatus"
    ];
    
    
    public function products(){
        return $this->belongsTo(Product::class,"product_id","id");
    }
}
