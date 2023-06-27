<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeSave extends Model
{
    use HasFactory;
    protected $table = "likes_tb";
    protected $fillable = [
        'media_id',
        "user_id",
        "product_id",
        "like_dislike",
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    
 
}
