<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Grades;
use App\Models\Questions;
use App\Models\Quize;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Question\Question;

class quizeController extends Controller
{
    public function index(){
        $data['Quizes']=Quize::all();
        return view('user.pages.Quizes')->with($data);
    }

    public function startQuize($id){
        $Quize=Quize::findOrFail($id);
        $data['QuizeName']=$Quize->name;
        $data['questions']=Questions::select('id','name','quize_id')->where('quize_id',$id)->get();
        $data['iteration']=['A','B','C','D'];
        $data['QuizeId']= $id;
        return view('user.pages.QuizeContent')->with($data);
    }

    public function result(Request $r){
        $QuizeId = $r->QuizeId ;
        $arrValue = array_values($r->all());
        $correntAnswer =0;
        $data['noOfQuestion']=Questions::where('quize_id',$QuizeId)->count();
        foreach($arrValue as $index => $objectValue){
            if($index > 1 ){
                foreach(json_decode($objectValue , true) as $key =>$val ){
                    $questionId = $key ;
                    $choiceId = $val ;
                    $answer=Answer::select('choice_id')->where('question_id',$questionId)->get()[0];
                    if($answer->choice_id === $choiceId ){
                        $correntAnswer +=1;
                    }
                    UserAnswer::create([
                        'choice_id'=>$choiceId,
                        'user_id'=>Auth::user()->id,
                        'question_id'=>$questionId,
                        'quize_id'=> $QuizeId,
                    ]);
                }
            }
        };
        Grades::create([
            'grade'=>$correntAnswer,
            'noOfQuestion'=>$data['noOfQuestion'],
            'user_id'=>Auth::user()->id,
            'quize_id'=> $QuizeId,
        ]);
        $data['correntAnswer']=$correntAnswer;
        $data['userAnswer']= UserAnswer::where('quize_id',$QuizeId)->where('user_id',Auth::user()->id)->get();
        return view('user.pages.QuizeAnswer')->with($data);
    }

}
