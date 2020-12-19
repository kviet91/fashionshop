@extends('admin.master')
@section('content')
    <!-- Right side -->
    <div id="rightSide">

        <!-- Account panel top -->

        <div class="topNav">
            <div class="wrapper">
                <div class="welcome">
                    <span>Xin chào: <b>admin!</b></span>
                </div>

                <div class="userNav">
                    <ul>
                        <li><a href="" target="_blank">
                                <img style="margin-top:7px;" src="{{ asset('admin/images/icons/light/home.png') }}"/>
                                <span>Trang chủ</span>
                            </a></li>

                        <!-- Logout -->
                        <li><a href="admin/home/logout.html">
                                <img src="{{ asset('admin/images/icons/topnav/logout.png') }}" alt=""/>
                                <span>Đăng xuất</span>
                            </a></li>

                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>

        <!-- Main content -->

        <!-- Common -->
        <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Đơn hàng sản phẩm</h5>
                    <span>Quản lý đơn hàng</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>

                        <li><a href="admin/product_order.html">
                                <img src="{{ asset('admin/images/icons/control/16/list.png') }}"/>
                                <span>Danh sách</span>
                            </a></li>

                        <li><a href="">
                                <img src="{{ asset('admin/images/excel.png') }}"/>
                                <span>Xuất file excel</span>
                            </a></li>
                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>

        <!-- Message -->
    @include('admin.notify')

    <!-- Main content wrapper -->
        <div class="wrapper">

            <div class="widget">
                <div class="title">
                    <span class="titleIcon"><img src="{{ asset('admin/images/excel.png') }}"/></span>
                    <h6>Danh sách Đơn hàng sản phẩm</h6>

                    <div class="num f12">Tổng số: <b>{{count($order)}}</b></div>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
                        <td style="width:60px;">Mã số</td>
                        <td>Sản phẩm</td>
                        <td style="width:80px;">Giá</td>
                        <td style="width:50px;">Số lượng</td>
                        <td style="width:70px;">Số tiền</td>
                        <td style="width:75px;">Đơn hàng</td>
                        <td style="width:75px;">Ngày tạo</td>
                        <td style="width:55px;">Hành động</td>
                    </tr>
                    </thead>

                    <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="9">

                            <div class='pagination'>
                                &nbsp;<strong>1</strong>&nbsp;<a href="admin/product_order/index/10">2</a>&nbsp;<a
                                        href="admin/product_order/index/10">Trang kế tiếp</a>&nbsp;
                            </div>
                        </td>
                    </tr>
                    </tfoot>

                    <tbody class="list_item">
                    @foreach($order as $order)
                        <tr class='row_20'>
                            <td class="textC">{{$order->id}}</td>

                            <td>
                                <div class="image_thumb">
                                    <img src="{{ asset('source/img') }}/{{ $order['img_link'] }}" height="50">
                                    <div class="clear"></div>
                                </div>

                                <a href="{{route('detail', $order->id)}}" class="tipS" title="" target="_blank">
                                    <b>{{$order->name}}</b>
                                </a>
                            </td>

                            <td class="textR">
                                {{number_format($order->pivot->amount)}}
                                <p style='text-decoration:line-through'>{{$order->product_id}}</p>
                            </td>

                            <td class="textC">{{$order->pivot->count}}</td>

                            <td class="textC">{{number_format($order->pivot->amount * $order->pivot->count)}}</td>


                            @if(!$order->pivot->status)
                                <td class="status textC">
						<span class="pending">
						Chờ xử lý						</span>
                                </td>
                            @else
                                <td class="status textC">
						<span class="completed">
						Thành công						</span>
                                </td>
                            @endif

                            <td class="textC">{{$order->pivot->created_at}}</td>

                            <td class="textC">
                                <a href="" class="lightbox">
                                    <img src="{{ asset('admin/images/icons/color/view.png') }}"/>
                                </a>
                                <a href="{{route('admin.transaction.order.getDelete', $order->id)}}" title="Xóa"
                                   class="tipS verify_action">
                                    <img src="{{ asset('admin/images/icons/color/delete.png') }}"/>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

        </div>
        <div class="clear mt30"></div>

        <!-- Footer -->
        <div id="footer">
            <div class="wrapper">
                <div>Bản quyền © E-SHOP 2018</div>
            </div>
        </div>
    </div>
@endsection