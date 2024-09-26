<?php

namespace App\Http\Controllers\doctore;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class doctoreCoursesController extends Controller
{
    public function index(){
        $data['courses']=Courses::all();
        return view('doctore.courses.index')->with($data);
    }

    public function create(){
        return view('doctore.courses.create');
    }

    public function store(Request $r){
     $validator=FacadesValidator::make($r->all(),[
        'name'=> 'required|string|max:50',
        ],[
        'name.required'=> 'اسم الماده مطلوب',
    ]);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInputs($r->all());
    }

    $data=[
        'name'=> $r->name,
        'user_id'=> Auth::user()->id,
    ];

    Courses::create($data);
    return redirect(route('doctore.courses'));
}

public function edit($id){
        $data['courses']=Courses::findOrFail($id);
        return view('doctore.courses.edit')->with($data);
}

public function update(Request $r){
        $validator=FacadesValidator::make($r->all(),[
            'name'=> 'required|string|max:50',
        ],[
            'name.required'=> 'اسم الماده مطلوب',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($r->all());
        }

        $data=[
            'name'=> $r->name,
            'user_id'=> Auth::user()->id,
        ];
        Courses::findOrFail($r->id)->update($data);

        return redirect(route('doctore.courses'));
}

public function delete($id){
        Courses::findOrFail($id)->delete();
        return back();
}



}
