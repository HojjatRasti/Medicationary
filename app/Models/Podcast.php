<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setCatAttribute($value)
    {
        $this->attributes['cat'] = json_encode($value);
    }
    public function getCatAttribute($value)
    {
        return $this->attributes['cat'] = json_decode($value);
    }
    public function category(){
        return $this->hasMany(Podcast_category::class);
    }
}
