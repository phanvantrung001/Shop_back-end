@extends('admin.layout.master')
@section('content')
<main class="page-content">
<section class="wrapper">
    <div class="panel-panel-default">
        <div class="market-updates">
            <div class="container">
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Đơn hàng</h1>
      <hr>
    </div>
    <table class="table"style="text-align:center">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">phone</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Ngày đặt Hàng</th>
            <th scope="col">total</th>
            <!-- {{-- <th scope="col">Tổng Tiền(Đồng)</th> --}} -->
            <th scope="col">Tùy Chọn</th>
          </tr>
        </thead>
        <tbody id="list-users">
            @foreach ($orders as $key=> $order)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$order->customer->name}}</td>
            <td>{{$order->customer->phone}}</td>
            <td>{{$order->customer->address}}</td>
            <td>{{$order->date_at}}</td>
            <td>{{$order->total}}</td>
            <!-- {{-- <td>{{number_format($order->total)}}</td> --}} -->
            <td>
                <a class="btn btn-primary" href="{{ route('order.show',$order->id) }}">chi tiet</a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</main>
</div>
</div>
</div>
</section>
</main>
@endsection