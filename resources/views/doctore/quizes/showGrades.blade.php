@extends('doctore.layouts.app')

@section('content')
<div class="container">
    <div class='table mt-5'>
        <div class='table_header'>
            <h2 style="width: fit-content ;display: block;"  > الدرجات</h2>
            <div class='table-tabe'>
                <div>
                    <a href='/dashboard'>لوحه التحكم</a>
                    <a href='/'>- الصفحه الرئيسيه</a>- <span>الدرجات</span>
                </div>
                <div>
                    <a style="color:#ffffff"  href="{{ route('quizes.create') }}" type="button" class="btn btn-primary">اضافه</a>
                </div>
            </div>
        </div>
        <div class='table_body'>
            <table>
                <thead>
                    <tr>
                        <th>{{ '#' }}</th>
                        <th>اسم الطالب</th>
                        <th>الاختبار</th>
                        <th>اسم الماده</th>
                        <th>الدرجه</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grades as $gr)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $gr->User->name }}</td>
                            <td>{{ $gr->Quize->name }}</td>
                            <td>{{ $gr->Quize->Course->name }}</td>
                            <td>{{ $gr->grade .'/'.$gr->noOfQuestion }}</td>
                            <td>
                                <a class="table_edit" href="{{ route('quizes.showAnswer',[$gr->User->id, $gr->Quize->id]) }}" >عرض الحل -</a>
                                {{-- <a class="table_delete" href="{{ route('quizes.delete',$q->id ) }}" >حزف</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
