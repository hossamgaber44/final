@extends('doctore.layouts.app')

@section('content')
<div class="container">
    <div class='table mt-5'>
        <div class='table_header'>
            <h2 style="width: fit-content ;display: block;"  > الاختبارات</h2>
            <div class='table-tabe'>
                <div>
                    <a href='/dashboard'>لوحه التحكم</a>
                    <a href='/'>الصفحه الرئيسيه</a>- <span>الاختبارات</span>
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
                        <th>الاسم</th>
                        <th>اسم الماده</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Quize as $q)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $q->name }}</td>
                            <td>{{ $q->Course->name }}</td>
                            <td>
                                <a class="table_edit" href="{{ route('quizes.showGrades',$q->id) }}" >عرض الدرجات -</a>
                                <a class="table_delete" href="{{ route('quizes.delete',$q->id ) }}" >حزف</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
