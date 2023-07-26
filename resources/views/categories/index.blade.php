@extends('layout.master')
@section('content')
@include('sweetalert::alert')

<div class="row"> <div class="col-lg-12 grid-margin stretch-card"> <div class="card"> <div class="card-header"> <form action="" method="get"> <div class="row mb-2"> <div class="col"> <a href="{{route('category.create')}}" class="btn btn-primary"> Thêm mới </a> <button type="button" class="btn btn-success "> Xuất execl </button> </div> </div>
routeros
Copy
      <div class="row">
        <div class="col">
          <input type="text" placeholder="Nhập ID" class="form-control">
        </div>
        <div class="col">
          <input type="text" placeholder="Nhập tên" class="form-control">
        </div>
      
        <div class="col">
          <button type="button" class="btn btn-info"> Tìm </button>
          <button type="button" class="btn btn-secondary "> Đặt lại </button>
        </div>
      </div>
    </form>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>TT</th>
            <th>Tên thể loại</th>
            <th>Mô tả</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
  @foreach($categories as $key => $category)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->mota}}</td>
            <td>
            <form action="{{route('category.destroy',[$category->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button onclick="return confirm('Bạn có muốn xóa này không?');" class="btn btn-danger">xoá</button>
              <a href="{{ route('category.edit',$category['id']) }}" class="btn btn-info">Sửa</a>
                </form>
            </td>
          </tr> 
  @endforeach
        </tbody>
      </table>
      
    </div>
  </div>
  <div class="card-footer">
    <nav class="float-right">
      <ul class="pagination mb-0">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
  </div>
</div>
</div> </div> @endsection('content')  