@extends('admin.layout.master')
@section('content')
<main class="page-content">
    <section class="wrapper">
        <div class="panel-panel-default">
            <div class="market-updates">
                <div class="container">
                    <main id="main" class="main">
                        <div class="pagetitle">
                            <h1>Chi tiết đơn hàng</h1>
                            <hr>
                        </div>
                        <table class="table" style="text-align:center">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Ngày đặt Hàng</th>
                                    <!-- <th scope="col">Ngày giao Hàng</th> -->
                                    <th scope="col">total</th>
                                    <!-- {{-- <th scope="col">Tổng Tiền(Đồng)</th> --}} -->
                                    <th scope="col">Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody id="list-users">
                                @foreach ($items->orderdetail as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class='text-left'>{{ $item->product->name }}</td>
                                    <td> {{number_format($item->product->price).' VND'}}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ number_format($item->total).' VND' }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                                <a class="btn btn-primary" href="{{ route('order.index')}}">Quay lai</a>
                            </tbody>
                        </table>
                    </main>
                </div>
            </div>
            
        </div>
    </section>
</main>
@endsection