@extends('doctore.layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="quize">
            <h1 class="quize_title">{{ $Grades->Quize->name }}</h1>
            <div >
            @foreach ($Questions as $key => $Qu )
                <div class="quize_content">
                    @php
                        // $question=App\Models\Questions::findOrFail($userAn->question_id);
                        $UserAnswer=App\Models\UserAnswer::where('user_id',$user_id)->where('question_id',$Qu->id)->get()[0];
                        $answer=App\Models\Answer::select('choice_id')->where('question_id',$Qu->id)->get()[0];
                        $iteration=['A','B','C','D'];
                        // dd($Choice);
                    @endphp
                    <h3 class="question"><span style="margin-left: 8px" >سؤال ({{ $key+1 }}) </span>{{ $Qu->name }}</h3>
                    <div class="choices_content">
                        @foreach ( $Qu->Choice as $index => $Choice )
                            <div class="choice">
                                @if ($answer->choice_id === $UserAnswer->choice_id )
                                    <input onclick="return false;"  @if($Choice->id == $UserAnswer->choice_id) checked id="choice{{ $Choice->id }}" @endif name="choice{{ $key }}"  type="radio" >
                                    <label @if($Choice->id == $UserAnswer->choice_id) style="background: #00ff00 ;"  @endif for="choice{{ $UserAnswer->choice_id }}"><b>({{ $iteration[$index] }}).</b><span>{{ $Choice->name }}</span></label>
                                @elseif ($answer->choice_id === $Choice->id )
                                    <input onclick="return false;"  name="choice{{ $key }}"  type="radio" >
                                    <label  style="background: #00ff00 ;"  for="choice{{ $UserAnswer->choice_id }}"><b>({{ $iteration[$index] }}).</b><span>{{ $Choice->name }}</span></label>
                                @else
                                    <input onclick="return false;"  @if($Choice->id == $UserAnswer->choice_id) checked id="choice{{ $Choice->id }}" @endif name="choice{{ $key }}"  type="radio" >
                                    <label for="choice{{ $UserAnswer->choice_id }}"   @if($Choice->id == $UserAnswer->choice_id) style="background: #ff0000 ;"  @endif ><b>({{ $iteration[$index] }}).</b><span>{{ $Choice->name }}</span></label>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <button class="show_btn">النتيجه: {{ $Grades->grade .'/'.$Grades->noOfQuestion }}</button>
            </div>
        </div>
    </div>
</section>
@endsection









