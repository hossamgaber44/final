@extends('user.layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="quize">
            <h1 class="quize_title">{{ $QuizeName }}</h1>
            <form method="POST" action="{{ route('Quize.result') }}" >
                @csrf
                <input type="hidden" name="QuizeId" value="{{ $QuizeId }}" >
            @foreach ($questions as $key => $q )
                <div class="quize_content">
                    <h3 class="question"><span style="margin-left: 8px" >سؤال ({{ $key+1 }}) </span>{{ $q->name }}</h3>
                    <div class="choices_content">
                        @foreach ( $q->Choice as $index => $Choice )
                            <div class="choice">
                                @php
                                    $uniqueNumber=hash('md5',$Choice.$key);
                                @endphp
                                <input name="choice{{ $key }}" value="{{ json_encode([$q->id => $Choice->id]) }}" id="choice{{ $uniqueNumber }}" type="radio" >
                                <label for="choice{{ $uniqueNumber }}"><b>({{ $iteration[$index] }}).</b><span>{{ $Choice->name }}</span></label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            @php
                $user_id=Illuminate\Support\Facades\Auth::user()->id;
                $Quize=App\Models\UserAnswer::select('id')->where('quize_id',$QuizeId)->where('user_id',$user_id)->get();
                // dd($Quize);
            @endphp
            @if ($Quize->count() == 0)
                <button class="show_btn">تأكيد</button>
            @else
                <span class="show_btn">تم اداء الاختبار من قبل</span>
            @endif
            </form>
        </div>
    </div>
</section>
@endsection









