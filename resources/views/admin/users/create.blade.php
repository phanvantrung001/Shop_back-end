@extends('admin.layout.master')
@section('content')
<main id="main">
    <h1>Thêm danh mục</h1>
    <form action="<?php echo route('user.store') ?>" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên :</label>
            <input type="text" id="fname" name="name" class="form-control">
            @error('name')

            <div style='color:red' class="alert alert-danger"> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" id="fname" name="email" class="form-control">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" id="fname" name="password" class="form-control">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Chức Vụ</label>
            <select name="group_id" id="" class="form-control">
                @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            @error('group_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" value="Lưu" class="btn btn-success">
        <a href="{{route('user.index')}}" class="btn btn-danger">Huỷ</a>
    </form>
</main>
@endsection