@extends('user.layouts.app')

@section('content')
<section class="courses">
    <div class="container">
        <h1 class="courses_title">المواد</h1>
        <div class="courses_content">
            @foreach ($courses as $course )
                <div class="course">
                    <h1  style="cursor: auto;" >{{ $course->name }}</h1>
                    <a href="{{ route('user.materials',$course->id) }}" >material</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
