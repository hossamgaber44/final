<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Materials;
use Illuminate\Http\Request;

class materialsController extends Controller
{
    public function index($id){
        // return $id;
        $data['course_name']=Courses::findOrFail($id)->name;
        $data['materials']=Materials::where('course_id',$id)->get();
        return view('user.pages.materials')->with($data);
    }
}
