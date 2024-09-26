@extends('doctore.layouts.app')

@section('content')
<div class="container">
    <div class='table mt-5'>
        <div class='table_header'>
            <h2  style="width: fit-content ;display: block;"   > الطلاب</h2>
            <div class='table-tabe'>
                <div>
                    <a href=''>لوحه التحكم</a>
                    <a href='/'>- الصفحه الرئيسيه</a>- <span>الطلاب</span>
                </div>
                {{-- <div>
                    <a href="" type="button" class="btn btn-primary">add</a>
                </div> --}}
            </div>
        </div>
        <div class='table_body'>
            <table>
                <thead>
                    <tr>
                        <th>{{ '#' }}</th>
                        <th>الاسم</th>
                        <th>الأيميل</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student as $st)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $st->name }}</td>
                            <td>{{$st->email}}</td>
                            <td>
                                <a class="table_delete" href="{{ route('doctore.deleteStudent',$st->id ) }}" >حزف</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
