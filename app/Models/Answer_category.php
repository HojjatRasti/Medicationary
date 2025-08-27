<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer_category extends Model
{
    use HasFactory;

    public $fillable = ['title'];

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
