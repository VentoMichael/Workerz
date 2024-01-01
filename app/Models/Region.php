<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    public function companies()
    {
        return $this->belongsToMany(User::class, 'user_region');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
