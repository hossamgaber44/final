<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function Quize(){
        return $this->hasMany('App\Models\Quize');
    }

    public function Materials(){
        return $this->hasMany('App\Models\Materials');
    }

}
