@extends('doctore.layouts.app')

@section('content')
<div class="container">
    <div class='table mt-5'>
        <div class='table_header'>
            <h2 style="width: fit-content ;display: block;"  > المواد</h2>
            <div class='table-tabe'>
                <div>
                    <a href='/dashboard'>لوحه التحكم</a>
                    <a href='/'>- الصفحه الرئيسيه</a>- <span>المواد</span>
                </div>
                <div>
                    <a style="color:#ffffff" href="{{ route('courses.create') }}" type="button" class="btn btn-primary">add</a>
                </div>
            </div>
        </div>
        <div class='table_body'>
            <table>
                <thead>
                    <tr>
                        <th>{{ '#' }}</th>
                        <th>الاسم</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $c)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $c->name }}</td>
                            <td><a href="{{ route('courses.edit', $c->id) }}" >تعديل -</a>
                                <a class="table_delete" href="{{ route('courses.delete',$c->id ) }}" >حزف</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
