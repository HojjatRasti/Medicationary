<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar_category extends Model
{
    use HasFactory;

    public $fillable = ['title'];

    public function webinars(){
        return $this->hasMany(Webinar::class);
    }
}
