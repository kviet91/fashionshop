@extends('master')

@section('content')
    @include('admin.notify')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('index')}}">Trang chủ</a></li>
                <li class="active">Thanh toán</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <form id="checkout-form" action="{{route('postcheckout')}}" method="post" class="clearfix">
                    @csrf
                    <div class="col-md-6">
                        <div class="billing-details">
                            <p><b>Bạn cần nhập/sửa đổi thông tin nơi nhận!</b></p>
                            <div class="section-title">
                                <h3 class="title">Thông tin người mua hàng</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="username" value="{{ Auth::user()->username }}"
                                       disabled placeholder="Tên người dùng" required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="name" value="{{ Auth::user()->fullname }}"
                                       placeholder="Họ và tên" required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" value="{{ Auth::user()->email }}"
                                       placeholder="Email" required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Địa chỉ"
                                       value="{{ Auth::user()->address }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="phone" placeholder="Số điện thoại"
                                       value="{{ Auth::user()->phone }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="input" type="te" name="msg" placeholder="Ghi chú">
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="shiping-methods">
                            <div class="section-title">
                                <h4 class="title">Phương thức vận chuyển</h4>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="shipping" value="0" id="shipping-1"
                                       onclick="document.getElementById('ship').innerHTML = 'Miễn phí vận chuyển'" checked>
                                <label for="shipping-1">Miễn phí vận chuyển - 0.00đ</label>
                                <div class="caption">
                                    <p>Toàn quốc, thời gian từ 5 - 7 ngày
                                    <p>
                                </div>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="shipping" value="25000" id="shipping-2"
                                       onclick="document.getElementById('ship').innerHTML = 'Chuyển phát nhanh: 25000 đồng'">
                                <label for="shipping-2">Chuyển phát nhanh - 25.000đ</label>
                                <div class="caption">
                                    <p>Toàn quốc, thời gian từ 1 - 3 ngày
                                    <p>
                                </div>
                            </div>
                        </div>

                        <div class="payments-methods">
                            <div class="section-title">
                                <h4 class="title">Phương thức thanh toán</h4>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="payments" value="Thanh toán trực tiếp" id="payments-1"
                                       checked>
                                <label for="payments-1">Thanh toán trực tiếp</label>
                                <div class="caption">
                                    <p>Thanh toán cho nhân viên giao hàng khi nhận hàng</p>
                                </div>
                            </div>
                            <div class="input-checkbox">
                                <input type="radio" name="payments" value="Thanh toán qua ATM" id="payments-2">
                                <label for="payments-2">Thanh toán qua ATM</label>
                                <div class="caption">
                                    <p>Chuyển khoản vào số tài khoản Agribank: 3606205207440</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(Session::has('cart'))
                        <div class="col-md-12">
                            <div class="order-summary clearfix">
                                <div class="section-title">
                                    <h3 class="title">Sản Phẩm Đã Mua</h3>
                                </div>
                                <table class="shopping-cart-table table">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th></th>
                                        <th class="text-center">Đơn giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Tổng tiền</th>
                                        <th class="text-right"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($item as $item)
                                        @if($item['item']['discount'] == 0)
                                            <tr>
                                                <td class="thumb"><img src="source/img/{{$item['item']['img_link']}}"
                                                                       alt=""></td>
                                                <td class="details">
                                                    <a href="{{route('detail', $item['item']['id'])}}">{{$item['item']['name']}}</a>
                                                </td>
                                                <td class="price text-center">
                                                    <strong>{{number_format($item['item']['price'])}}đ</strong></td>
                                                <td class="qty text-center"><input class="input" type="text"
                                                                                   value="{{$item['qty']}}" disabled>
                                                </td>
                                                <td class="total text-center"><strong
                                                            class="primary-color">{{number_format($item['item']['price'] * $item['qty'])}}
                                                        đ</strong></td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="thumb"><img src="source/img/{{$item['item']['img_link']}}"
                                                                       alt=""></td>
                                                <td class="details">
                                                    <a href="#">{{$item['item']['name']}}</a>
                                                </td>
                                                <td class="price text-center">
                                                    <strong>{{number_format($item['item']['price']- $item['item']['price'] * $item['item']['discount'])}}
                                                        đ</strong><br>
                                                    <del class="font-weak">
                                                        <small>{{number_format($item['item']['price'])}}đ</small>
                                                    </del>
                                                </td>
                                                <td class="qty text-center"><input class="input" type="text"
                                                                                   value="{{$item['qty']}}" disabled>
                                                </td>
                                                <td class="total text-center"><strong
                                                            class="primary-color">{{number_format(($item['item']['price'] - $item['item']['price'] * $item['item']['discount'])  * $item['qty'])}}
                                                        đ</strong></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>TOTAL</th>
                                        <th colspan="2" class="sub-total">{{$cart->totalPrice}}đ</th>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>SHIPING</th>
                                        <td colspan="2" id="ship"></td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="pull-right">
                                    <button type="submit" class="primary-btn">Đặt hàng</button>
                                </div>
                            </div>

                        </div>
                    @endif
                </form>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection