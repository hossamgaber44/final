@extends('user.layouts.app')

@section('content')
<section class="courses">
    <div class="container">
        <h1 class="courses_title">الكتب</h1>
        <sub style="font-size: 30px;" >*</sub> <h3 class="materials_name" >{{ $course_name }}</h3>
        <div class="courses_content">
            @foreach ($materials as $m )
                <div class="materials">
                    <a href="{{ asset($m->path) }}">{{ $m->name }}</a>
                    <a href="{{ asset($m->path) }}" download >تنزيل</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
