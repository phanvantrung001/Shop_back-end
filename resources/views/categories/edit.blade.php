@extends('layout.master')
@section('content')
<main id="main">
    <h1>Chỉnh sửa</h1>
    <form action="{{route('category.update',[$category->id])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên :</label>
            <input type="text" id="fname" name="name" value='{{$category->name}}' class="form-control">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class=" form-control-label">Mô tả</label>
            <textarea type="text" class="is-invalid form-control" name="mota" value='{{$category->mota}}' id="description">{{ old('description') }}</textarea>
            @error('mota')
            <div class="alert alert-danger mb-3 ">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" value="Lưu" class="btn btn-success">
        <a href="{{route('category.index')}}" class="btn btn-danger">Huỷ</a>
    </form>
</main>
@endsection