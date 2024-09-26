@extends('user.layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="quize">
            <h1 class="quize_title">اختبار الرياضيات</h1>
            <div >
                {{-- {{dd($userAnswer)}} --}}
            @foreach ($userAnswer as $key => $userAn )
                <div class="quize_content">
                    @php
                        $question=App\Models\Questions::findOrFail($userAn->question_id);
                        $Choice=App\Models\Choices::where('questions_id',$userAn->question_id)->get();
                        $answer=App\Models\Answer::select('choice_id')->where('question_id',$userAn->question_id)->get()[0];
                        $iteration=['A','B','C','D'];
                        // dd($Choice);
                    @endphp
                    <h3 class="question"><span style="margin-left: 8px" >سؤال ({{ $key+1 }}) </span>{{ $question->name }}</h3>
                    <div class="choices_content">
                        @foreach ( $Choice as $index => $Choice )
                            <div class="choice">
                                @if ($answer->choice_id === $userAn->choice_id )
                                    <input onclick="return false;"  @if($Choice->id == $userAn->choice_id) checked id="choice{{ $Choice->id }}" @endif name="choice{{ $key }}"  type="radio" >
                                    <label @if($Choice->id == $userAn->choice_id) style="background: #00ff00 ;"  @endif for="choice{{ $userAn->choice_id }}"><b>({{ $iteration[$index] }}).</b><span>{{ $Choice->name }}</span></label>
                                @elseif ($answer->choice_id === $Choice->id )
                                    <input onclick="return false;"  name="choice{{ $key }}"  type="radio" >
                                    <label  style="background: #00ff00 ;"  for="choice{{ $userAn->choice_id }}"><b>({{ $iteration[$index] }}).</b><span>{{ $Choice->name }}</span></label>
                                @else
                                    <input onclick="return false;"  @if($Choice->id == $userAn->choice_id) checked id="choice{{ $Choice->id }}" @endif name="choice{{ $key }}"  type="radio" >
                                    <label for="choice{{ $userAn->choice_id }}"   @if($Choice->id == $userAn->choice_id) style="background: #ff0000 ;"  @endif ><b>({{ $iteration[$index] }}).</b><span>{{ $Choice->name }}</span></label>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <div class="quize_back" style="width: fit-content;margin:auto;">
                <button class="show_btn">النتيجه: {{ $correntAnswer.'/'.$noOfQuestion }}</button>
                <a href="{{ route('user.Quize') }}" class="show_btn">رجوع</a>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection









