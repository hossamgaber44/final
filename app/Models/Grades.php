<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function User(){
        return $this->belongsTo('App\Models\User');
    }

    public function Quize(){
        return $this->belongsTo('App\Models\Quize');
    }

}
