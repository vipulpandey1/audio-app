<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentSave extends Model
{
    use HasFactory;
    protected $table = "play_list";
    protected $fillable = [
        'media_id',
        "user_id",
        "product_id",
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    
 
}
