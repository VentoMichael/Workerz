<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $casts = [
        'logoUpload' => 'json',
        'backgroundUpload' => 'json',
    ];
    protected $table = 'companies';
    protected $guarded;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'company_region');
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'company_subskills')->withTimestamps();
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'mainSkill');
    }
}
