<?php

namespace App\Http\Controllers\doctore;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class booksController extends Controller
{
    public function index(){
        $data['Materials']=Materials::all();
        return view('doctore.books.index')->with($data);
    }

    public function create(){
        $data['courses']=Courses::all();
        return view('doctore.books.create')->with($data);
    }

public function store(Request $r){
     $validator=FacadesValidator::make($r->all(),[
        'course_id'=> 'required|exists:courses,id',
        'book'=> 'required'
        ],[
        'course_id.required'=> 'اسم الماده مطلوب',
        'book.required'=> 'يجب ادخال الكتاب',
    ]);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInputs($r->all());
    }

    $book_name=$r->book->getClientOriginalName();
    $file_name = time() . '.' . $book_name;
    $path = 'Materials';
    $r->book->move($path, $file_name);

    $data=[
        'name'=> $book_name,
        'course_id'=>$r->course_id ,
        'path'=>$path.'/'.$file_name,
    ];
    Materials::create($data);
    return redirect(route('doctore.books'));
}

public function edit($id){
        $data['courses']=Courses::all();
        $data['Materials']=Materials::findOrFail($id);
        return view('doctore.books.edit')->with($data);
}

    public function update(Request $r){
        $validator=FacadesValidator::make($r->all(),[
            'id'=> 'required',
            'course_id'=> 'required|exists:courses,id',
            'book'=> 'nullable'
        ],[
            'course_id.required'=> 'اسم الماده مطلوب',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($r->all());
        }
        $old_file_name = Materials::findOrFail($r->id)->name;
        $old_path = Materials::findOrFail($r->id)->path;

        if ($r->hasFile('book')) {
            $file_path = public_path($old_path);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $book_name=$r->book->getClientOriginalName();
            $file_name = time() . '.' . $book_name;
            $path = 'Materials';
            $r->book->move($path, $file_name);

            $data=Materials::findOrFail($r->id)->update([
                'name'=> $book_name,
                'course_id'=>$r->course_id ,
                'path'=>$path.'/'.$file_name,
            ]);
            return redirect(route('doctore.books'));
        } else {
            $data=Materials::findOrFail($r->id)->update([
                'name'=> $old_file_name,
                'course_id'=>$r->course_id ,
                'path'=>$old_path,
            ]);
            return redirect(route('doctore.books'));
        };
    }

    public function delete($id){
        $old_file_name =  Materials::findOrFail($id)->path;
        $file_path = public_path($old_file_name);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        Materials::findOrFail($id)->delete();
            return back();
    }



}
