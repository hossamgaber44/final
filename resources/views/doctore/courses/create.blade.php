@extends('doctore.layouts.app')
@section('content')
    <div class="padding_nav">
        <div class="container">
            <div class="my-3  d-flex justify-content-between "  style="margin-top: 8rem !important;" >
                <h3>اضافه ماده جديده</h3>
                <a href="{{ route('doctore.courses') }}" type="button" class="btn btn-primary">رجوع</a>
            </div>
            <form action="{{ route('courses.store') }}" method="POST"  enctype="multipart/form-data" >
                @csrf
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">اسم الماده</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="staticName"
                            placeholder="ادخل اسم الماده...">
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" style="display: block" class="btn btn-primary m-auto">تأكيد</button>
            </form>
        </div>
    </div>
@endsection
