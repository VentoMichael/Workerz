<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $guarded;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'ad_skills');
    }
    public function test(){
        $string = "foobar";

        // shave the last two characters off of $string
    }
}
