<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = "sliders";
    protected $fillable = ["type","category_id","title","image","path","mobile_image","link"];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
