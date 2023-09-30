<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public static  function search($searchKey)
    {
        return self::where('name', 'LIKE', '%' . $searchKey . '%');
    }
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_subskills');
    }
    public function ads()
    {
        return $this->belongsToMany(Ad::class, 'ad_skills');
    }
}
