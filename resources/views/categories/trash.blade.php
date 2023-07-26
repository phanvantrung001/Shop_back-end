@extends('layout.master')
@section('content')
@include('sweetalert::alert')
    <table class="table" style="text-align: center;">
        <h1 style="text-align: center; color: black;">Thùng rác</h1>
        <thead>
            <tr>
                <th scope="col">Số thứ tự</th>
                <th scope="col">Tên</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Công cụ</th>
        </thead>
        <tbody>
            @foreach ($softs as $key => $soft)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $soft->name }}</td>
                    <td>{{ $soft->mota }}</td>
                    <td>
                        <a href="{{ route('category.restore', [$soft->id]) }}" class="btn btn-warning">Khôi phục</a>
                        <form action="{{ route('category.destroy', [$soft->id]) }}" method='post'>
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('category.deleteforever', [$soft->id]) }}"
                                onclick="return confirm('Bạn có chắc chắn xóa vĩnh viễn không?');"
                                class="btn btn-secondary">Xóa vĩnh viễn</a>
                        </form>
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('category.index') }}" class="btn btn-info">Trở lại</a> <br>
@endsection