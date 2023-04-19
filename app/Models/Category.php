<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ="categories";
    protected $fillable = ["name","meta","title","description","desktop_image","mobile_image","slider_desktop_image","mobile_slider_image"];
}
