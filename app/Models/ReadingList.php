<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadingList extends Model
{
    use HasFactory;
    protected $table = "reading_tb";
    protected $fillable = [
        "title",
        "description",
        "product_id",
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    
 
}