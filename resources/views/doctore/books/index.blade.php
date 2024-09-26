@extends('doctore.layouts.app')

@section('content')
<div class="container">
    <div class='table mt-5'>
        <div class='table_header'>
            <h2 style="width: fit-content ;display: block;"  > الكتب</h2>
            <div class='table-tabe'>
                <div>
                    <a href='/dashboard'>لوحه التحكم</a>
                    <a href='/'>- الصفحه الرئيسيه</a>- <span>الكتب</span>
                </div>
                <div>
                    <a style="color:#ffffff" href="{{ route('books.create') }}" type="button" class="btn btn-primary">اضافه</a>
                </div>
            </div>
        </div>
        <div class='table_body'>
            <table>
                <thead>
                    <tr>
                        <th>{{ '#' }}</th>
                        <th>اسم الماده</th>
                        <th>اسم الكتاب</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Materials as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->Course->name }}</td>
                            <td>{{ $m->name }}</td>
                            <td><a href="{{ route('books.edit', $m->id) }}" >تعديل -</a>
                                <a class="table_delete" href="{{ route('books.delete',$m->id ) }}" >حزف</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
