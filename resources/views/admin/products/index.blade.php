@extends('admin.layout.master')
@section('content')
@include('sweetalert::alert')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <form action="" method="get"  >
          <div class="row mb-2">
            <div class="col">
              <a href="{{route('product.create')}}" class="btn btn-primary"> Thêm mới </a>
              <button type="button" class="btn btn-success "> Xuất execl </button>
            </div>
          </div>

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
                <th>anh</th>
                <th>ten</th>
                <th>thuoc the loai</th>
                <th>gia</th>
                <th>so lượng</th>
                <th>trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $key => $product)
              <tr>
                <td>{{$key+1}}</td>
                <td><img src="{{asset($product->img)}}" alt=""></td>  
                <td>{{$product->name}}</td>
                <td>{{$product->category ? $product->category->name : ''}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>
                  @if($product->status == 0)
                  <?php echo 'hết hàng' ?>
                  @else
                  <?php echo 'Còn hàng' ?>
                  @endif
                </td>

                <td>
                <form action="{{ route('product.destroy', [$product->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-primary" href="{{ route('product.edit', $product['id']) }}">sửa<i
                            class="bi bi-pencil-square"></i></a>
                    <button onclick="return confirm('Bạn có muốn xóa này không?');" class="btn btn-danger">xoá<i
                            class="bi bi-trash3"></i></button>
                </form>
            </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="card-footer">
            <nav class="float-right">
              {{ $products->links() }}
            </nav>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection('content')