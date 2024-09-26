@extends('user.layouts.app')

@section('content')
<section class="courses">
    <div class="container">
        <h1 class="courses_title">الاختبارات</h1>
        <div class="courses_content">
            @foreach  ($Quizes as $q)
                <div class="course">
                    <h1 style="cursor: auto;" >{{ $q->Course->name }}<br> <span class="mt-2" style="font-size: 16px;" >{{ $q->name }}</span></h1>
                    <a href="{{ route('Quize.start',$q->id) }}" >بدأ الاختبار</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
