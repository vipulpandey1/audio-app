<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = "user_profile";
    protected $fillable = [
        "user_id",
        "first_name",
        "last_name",
        "profile_photo",
        "phone_number"
    ];
}
