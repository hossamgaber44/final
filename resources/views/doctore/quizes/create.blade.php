@extends('doctore.layouts.app')
@section('content')
    <div class="padding_nav">
        <div class="container">
            <div class="my-3  d-flex justify-content-between "  style="margin-top: 8rem !important;" >
                <h3>اضافه اختبار جديده</h3>
                <a href="{{ route('doctore.courses') }}" type="button" class="btn btn-primary">رجوع</a>
            </div>
            <form action="{{ route('quizes.store') }}" method="POST"  enctype="multipart/form-data" >
                @csrf
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">اسم الاختبار</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="staticName"
                            placeholder="ادخل اسم الاختبار...">
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <label class="col-sm-2 col-form-label mt-3" for="course_id"> اختر الماده</label>
                    <div class=" col-sm-10 mt-3">
                        <select name="course_id"  class="form-control" id="course_id">
                            @foreach ($courses as $c)
                                <option value="{{ $c->id}}" >{{ $c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error )
                        <span style="display: block; margin: 4px auto;" class="form-text text-danger ">{{ $error }}</span>
                    @endforeach
                @endif

                <div id="newQuestion">
                    <div class="form-group row" style="overflow: hidden; position: relative; padding: 30px 0px; border: 1px solid #b7b7b7; border-radius: 14px;">
                        <label for="staticName" class="col-sm-2 col-form-label">ادخل السؤال</label>
                        <div class="col-sm-10">
                            <input type="text" name="question[0]" class="form-control" id="staticName"
                                placeholder="ادخل السؤال...">
                            @error('question.0')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label for="staticName" class="col-sm-2 col-form-label mt-3 ">ادخل الاختيارات</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" name="choice[0][0]" class="form-control" id="staticName"
                                placeholder="ادخل الاختيار الاول...">
                            @error('choice[0][0]')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-5 mt-3">
                            <input type="text" name="choice[0][1]" class="form-control" id="staticName"
                                placeholder="ادخل الاختيار الثاني...">
                            @error('choice[0][1]')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-5 mt-3">
                            <input type="text" name="choice[0][2]" class="form-control" id="staticName"
                                placeholder="ادخل الاختيار الثالث...">
                            @error('choice[0][2]')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-5 mt-3">
                            <input type="text" name="choice[0][3]" class="form-control" id="staticName"
                                placeholder="ادخل الاختيار الرابع...">
                            @error('choice[0][3]')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label for="staticName" class="col-sm-2 col-form-label mt-3 ">ادخل الاجابه الصحيحه</label>
                        <div class="col-sm-10 mt-3">
                            <select name="answer[0]"  class="form-control" id="answer">
                                <option value="1" >A</option>
                                <option value="2" >B</option>
                                <option value="3" >C</option>
                                <option value="4" >D</option>
                            </select>
                            @error('answer')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <span class="question_index" >1</span>
                    </div>
                </div>
                <div style="width: fit-content; margin: 26px auto 8px;">
                    <button type="submit" class="btn btn-primary mb-2">تأكيد</button>
                    <span onclick="addQuestion()" class="btn btn-primary mb-2">اضافه سؤال جديد</span>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('script')

<script>
    let index = 1;
    function addQuestion() {
        var newQuestion = document.createElement('div');
        newQuestion.innerHTML=
        `
        <div class="form-group row" style="overflow: hidden; position: relative; padding: 30px 0px; border: 1px solid #b7b7b7; border-radius: 14px;">
                    <label for="staticName" class="col-sm-2 col-form-label">ادخل السؤال</label>
                    <div class="col-sm-10">
                        <input type="text" name="question[${index}]" class="form-control" id="staticName"
                            placeholder="ادخل السؤال...">
                            @error('question.${index}')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <label for="staticName" class="col-sm-2 col-form-label mt-3 ">ادخل الاختيارات</label>
                    <div class="col-sm-5 mt-3">
                        <input type="text" name="choice[${index}][0]" class="form-control" id="staticName"
                            placeholder="ادخل الاختيار الاول...">
                        @error('choice[${index}][0]')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-5 mt-3">
                        <input type="text" name="choice[${index}][1]" class="form-control" id="staticName"
                            placeholder="ادخل الاختيار الثاني...">
                        @error('choice[${index}][1]')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5 mt-3">
                        <input type="text" name="choice[${index}][2]" class="form-control" id="staticName"
                            placeholder="ادخل الاختيار الثالث...">
                        @error('choice[${index}][2]')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-5 mt-3">
                        <input type="text" name="choice[${index}][3]" class="form-control" id="staticName"
                            placeholder="ادخل الاختيار الرابع...">
                        @error('choice[${index}][3]')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <label for="staticName" class="col-sm-2 col-form-label mt-3 ">ادخل الاجابه الصحيحه</label>
                    <div class="col-sm-10 mt-3">
                        <select name="answer[${index}]"  class="form-control" id="answer">
                            <option value="1" >A</option>
                            <option value="2" >B</option>
                            <option value="3" >C</option>
                            <option value="4" >D</option>
                        </select>
                        @error('answer[${index}]')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <span class="question_index" >${index+1}</span>
                    </div>
        `;
        index += 1;
        document.getElementById('newQuestion').appendChild(newQuestion);
    }
</script>

@endsection
