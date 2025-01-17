<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choices extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function Question(){
        return $this->belongsTo('App\Models\Questions');
    }

}
