@extends('admin.layout.master')
@section('content')
<h3>Danh sách </h3>
<a class="btn btn-primary" href="{{route('group.create')}}"><i class="bi bi-plus-circle"></i>Thêm</a>
<table class="table" style="text-align:center">
    <thead>
        <tr>
            <th scope="col">Số thứ tự</th>
            <th scope="col">Tên</th>
            <th scope="col">Người đảm nhận </th>
            <th scope="col">Quản lý</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($groups as $key => $group)
        <tr>
            <td> {{$group['id']}}</td>
            <td> {{$group['name']}}</td>
            <td>Hiện có {{count($group->user) }} người</td>
            <td>
                <form action="{{route('group.destroy',[$group->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-primary" href="{{ route('group.edit',$group['id']) }}"><i class="bi bi-trash3"></i>Sửa</a>
                    <a class="btn btn-primary " href="{{route('group.show', $group->id)}}">Xem</a>

                    <button onclick="return confirm('Bạn có muốn xóa này không?');" class="btn btn-danger"><i class="bi bi-pencil-square"></i>Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endsection