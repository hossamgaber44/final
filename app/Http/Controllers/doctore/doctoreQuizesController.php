<?php

namespace App\Http\Controllers\doctore;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Choices;
use App\Models\Courses;
use App\Models\Grades;
use App\Models\Questions;
use App\Models\Quize;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class doctoreQuizesController extends Controller
{
    public function index(){
        $data['Quize']=Quize::all();
        return view('doctore.quizes.index')->with($data);
    }

    public function create(){
        $data['courses']=Courses::all();
        return view('doctore.quizes.create')->with($data);
    }

public function store(Request $r){
    // dd($r);
    $validator=FacadesValidator::make($r->all(),[
        'name'=> 'required|string|max:50',
        'course_id'=> 'required|exists:courses,id',
        'question'=> 'required|array|min:1',
        'choice'=>'required|array|min:1',
        'answer'=> 'required|array|min:1',
        'question.*'=> 'required',
        'choice.*'=>'required',
        'answer.*'=> 'required',
    ],[
        'name.required'=> 'اسم الختبار مطلوب',
        'course_id.required'=> 'اسم الماده مطلوب',
        'question.required'=> 'السؤال مطلوب',
        'choice.required'=>'يجب اضافه سؤال علي الاقل',
        'answer.required'=> 'اجابه السؤال الصحيحه مطلوبه',
    ]);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInputs($r->all());
    }

    $data=[
        'name'=> $r->name,
        'course_id'=> $r->course_id,
    ];

    $QuizeId = Quize::create($data)->id;

    if(isset($r->choice) && is_array($r->choice) && isset($r->question) && is_array($r->question)){
        $index=0;
        foreach($r->choice as $ch){
            $QuestionId = Questions::create([
                'name'=> $r->question[$index],
                'quize_id'=> $QuizeId,
            ])->id;
            $answerIndex=1;
            foreach($ch as $c){
                $ChoiceId=Choices::create([
                    'questions_id'=>$QuestionId,
                    'name' => $c,
                ])->id;
                if(intval($answerIndex) === intval($r->answer[$index])){
                    Answer::create([
                        'question_id'=>$QuestionId,
                        'choice_id'=>$ChoiceId,
                    ]);
                }
                $answerIndex+=1;
            };
            $index+=1;
        };
    };
    return redirect(route('doctore.quizes'));
}

public function showGrades($id){
    $data['grades']=Grades::where('quize_id',$id)->get();
    return view('doctore.quizes.showGrades')->with($data);
}

public function showAnswer($user_id ,$quize_id){
    $data['Grades']=Grades::where('user_id',$user_id)->where('quize_id',$quize_id)->get()[0];
    $data['user_id']=$user_id;
    $data['Questions']=Questions::where('quize_id',$quize_id)->get();
    return view('doctore.quizes.showQuizeAnswer')->with($data);
}


public function delete($id){
    Quize::findOrFail($id)->delete();
    return back();
}

}
