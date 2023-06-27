<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReccommendationSave extends Model
{
    use HasFactory;
    protected $table = "reccommendation_save";
    protected $fillable = [
        "sub_id","click","user_id"
    ];
}
