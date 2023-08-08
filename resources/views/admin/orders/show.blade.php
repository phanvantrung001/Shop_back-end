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
                                    <th scope="col">Tên Khách Hàng</th>
                                    <th scope="col">name</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">Ngày đặt Hàng</th>
                                    <th scope="col">Ngày giao Hàng</th>
                                    <th scope="col">total</th>
                                    <!-- {{-- <th scope="col">Tổng Tiền(Đồng)</th> --}} -->
                                    <th scope="col">Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody id="list-users">
                                @foreach ($items as $key=> $item)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$item->order_id}}</td>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->date_at}}</td>
                                    <td>{{$item->order->date_ship}}</td>
                                    <td>{{$item->total}}</td>
                                    <!-- {{-- <td>{{number_format($order->total)}}</td> --}} -->

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