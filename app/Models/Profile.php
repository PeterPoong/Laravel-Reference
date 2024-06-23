<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\Guard;

class Profile extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function profileImage()
    {
        if(empty($this->image))
        {
            return '/storage/profile/defaultProfile.jpeg';
        }
        return '/storage/'.($this->image);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
