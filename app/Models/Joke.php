<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    protected $fillable = ['api_joke_id', 'content'];
    use HasFactory;

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function avgRating()
    {
        return $this->ratings()->avg('rate');
    }
}
