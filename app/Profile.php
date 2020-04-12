<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profileImage()
    {
        return ($this->image) ? $this->image : asset('svg/no_image_available.svg');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
