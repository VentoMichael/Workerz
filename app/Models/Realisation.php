<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisation extends Model
{
    use HasFactory;

    protected $casts = [
        'pictures' => 'array',
    ];

    protected $fillable = ['user_id', 'title', 'description', 'pictures'];

    public function freelancer()
    {
        return $this->belongsTo(User::class);
    }

    // Mutator to convert array to JSON when setting the attribute
    public function setPicturesAttribute($value)
    {
        $this->attributes['pictures'] = json_encode($value);
    }

    // Accessor to convert JSON to array when retrieving the attribute
    public function getPicturesAttribute($value)
    {
        return json_decode($value, true);
    }

}
