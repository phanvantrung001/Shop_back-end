@extends('shop.layout.master')
@section('content')
@include('sweetalert::alert')
<div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <img class="w-100 h-100" src="{{ asset($product->img) }}" alt="Image">
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">Tên sản phẩm: {{ $product['name'] }}</h3><br>

                <h3 class="font-weight-semi-bold mb-4">Giá tiền:
                    {{ str_replace(',', '.', number_format(floatval($product->price))) . ' VND' }}</h3><br>

                <h3 class="mb-4">
                    Mô tả:<h5>{!! $product['description'] !!}</h5>

                </h3>

                <div class="d-flex align-items-center mb-4 pt-2">
                    <a class="btn btn-success add-to-cart-btn" data-url="{{ route('shop.addtocart',$product->id)  }}">
                        <i class="fa fa-shopping-cart mr-2 add-to-cart-btn"></i> Thêm vào giỏ hàng
                    </a>
                    <button class="btn btn-dark" onclick="window.history.back()">
                        <i class="fa fa-arrow-left mr-2"></i> Quay lại
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Khi click vào nút thêm vào giỏ hàng
            $('.add-to-cart-btn').on('click', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                addCart(url);
            });
        });

        function addCart(url) {
            $.ajax({
                    url: url,
                    dataType: 'json',
                    method: 'GET',
                })
                .done(function(response) {
                    $('.cart-quantity').text(response.cartQuantity);
                    alert('Thêm sản phẩm vào giỏ hàng thành công');
                })
                .fail(function(xhr) {
                    console.error('Lỗi:', xhr);
                    alert('Đã xảy ra lỗi. Vui lòng thử lại');
                });
        }
    </script>
@endsection