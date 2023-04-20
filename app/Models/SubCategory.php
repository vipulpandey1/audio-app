<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = "subcategories";
    protected $fillable = ["name","meta","title","description","desktop_image","mobile_image","slider_desktop_image","mobile_slider_image"];

}
