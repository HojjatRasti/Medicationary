<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast_category extends Model
{
    use HasFactory;

    public $fillable = ['title'];

    public function podcasts(){
        return $this->hasMany(Podcast::class);
    }
}
