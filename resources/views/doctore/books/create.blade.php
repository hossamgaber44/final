@extends('doctore.layouts.app')
@section('content')
    <div class="padding_nav">
        <div class="container">
            <div class="my-3  d-flex justify-content-between" style="margin-top: 8rem !important;" >
                <h3>اضافه كتاب جديده</h3>
                <a href="{{ route('doctore.books') }}" type="button" class="btn btn-primary">رجوع</a>
            </div>
            <form action="{{ route('books.store') }}" method="POST"  enctype="multipart/form-data" >
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label mt-3" for="course_id"> اختر الماده</label>
                    <div class=" col-sm-10 mt-3">
                        <select name="course_id"  class="form-control" id="course_id">
                            @foreach ($courses as $c)
                                <option value="{{ $c->id}}" >{{ $c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="staticName" class="col-sm-2 col-form-label mt-4">الكتاب</label>
                    <div class="col-sm-10 mt-4">
                        <input type="file" name="book" class="form-control" id="staticName" >
                        @error('book')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" style="display: block" class="btn btn-primary m-auto ">تأكيد</button>
            </form>
        </div>
    </div>
@endsection
