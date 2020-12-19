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
                        <li><a href="{{ route('logout') }}">
                                <img src="{{ asset('admin/images/icons/topnav/logout.png') }}" alt=""/>
                                <span>Đăng xuất</span>
                            </a></li>

                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>

        <!-- Main content -->

        <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Bảng điều khiển</h5>
                    <span>Trang quản lý hệ thống</span>
                </div>

                <div class="clear"></div>
            </div>
        </div>

        <div class="line"></div>


        <!-- Message -->


        <!-- Main content wrapper -->
        <div class="wrapper">

            <div class="widgets">
                <!-- Stats -->

                <!-- Amount -->
                <div class="oneTwo">
                    <div class="widget">
                        <div class="title">
                            <img src="{{ asset('admin/images/icons/dark/money.png') }}" class="titleIcon"/>
                            <h6>Doanh số</h6>
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
                            <tbody>

                            <tr>
                                <td class="fontB blue f13">Tổng doanh số</td>
                                <td class="textR webStatsLink red" style="width:120px;"></td>
                            </tr>

                            <tr>
                                <td class="fontB blue f13">Doanh số hôm nay</td>
                                <td class="textR webStatsLink red" style="width:120px;">0 đ</td>
                            </tr>

                            <tr>
                                <td class="fontB blue f13">Doanh số theo tháng</td>
                                <td class="textR webStatsLink red" style="width:120px;">
                                    0 đ
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- User -->
                <div class="oneTwo">
                    <div class="widget">
                        <div class="title">
                            <img src="{{ asset('admin/images/icons/dark/users.png') }}" class="titleIcon"/>
                            <h6>Thống kê dữ liệu</h6>
                        </div>

                        <table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
                            <tbody>

                            <tr>
                                <td>
                                    <div class="left">Tổng số giao dịch</div>
                                    <div class="right f11"><a href="{{route('admin.transaction')}}">Chi tiết</a></div>
                                </td>

                                <td class="textC webStatsLink">
                                    {{count($transaction)}}                    </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="left">Tổng số sản phẩm</div>
                                    <div class="right f11"><a href="{{route('admin.product')}}">Chi tiết</a></div>
                                </td>

                                <td class="textC webStatsLink">
                                    {{count($product)}}                    </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="left">Tổng số thành viên</div>
                                    <div class="right f11"><a href="{{route('admin.user')}}">Chi tiết</a></div>
                                </td>

                                <td class="textC webStatsLink">
                                    {{count($user)}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="clear"></div>

                <!-- Giao dich thanh cong gan day nhat -->

                <div class="widget">
                    <div class="title">
                        <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"/></span>
                        <h6>Danh sách Giao dịch</h6>
                        <div class="num f12">Tổng số: <b>{{count($transaction)}}</b></div>
                    </div>

                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">

                        <thead class="filter">
                        <tr>
                            <td colspan="9">
                                <form class="list_filter form" action="index.php/admin/tran.html" method="get">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>

                                        <tr>
                                            <td class="label" style="width:60px;"><label for="filter_id">Mã
                                                    số</label></td>
                                            <td class="item"><input name="id" value="" id="filter_id" type="text"
                                                                    style="width:95px;"/></td>

                                            <td class="label" style="width:60px;"><label for="filter_type">Hình
                                                    thức</label>
                                            </td>
                                            <td class="item">
                                                <select name="payment">
                                                    <option value=""></option>
                                                    <option value=''>Trực tiếp</option>
                                                    <option value=''>Chuyển khoản</option>
                                                </select>
                                            </td>

                                            <td colspan='2' style='width:60px'>
                                                <input type="submit" class="button blueB" value="Lọc"/>
                                                <input type="reset" class="basic" value="Reset"
                                                       onclick="window.location.href = 'index.php/admin/tran.html'; ">
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="label" style="width:60px;"><label for="filter_user">Thành
                                                    viên</label></td>
                                            <td class="item"><input name="user" value="" id="filter_user"
                                                                    class="tipS"
                                                                    title="Nhập mã thành viên" type="text"/></td>

                                            <td class="label"><label for="filter_status">Giao dịch</label></td>
                                            <td class="item">
                                                <select name="status">
                                                    <option></option>
                                                    <option value='0'>Đợi xử lý</option>
                                                    <option value='1'>Thành công</option>
                                                </select>
                                            </td>

                                            <td class="label"></td>
                                            <td class="item"></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </form>
                            </td>
                        </tr>
                        </thead>
                        <thead>
                        <tr>
                            <td style="width:10px;"><img src="{{ asset('admin/images/icons/tableArrows.png') }}"/>
                            </td>
                            <td style="width:60px;">Mã số</td>
                            <td style="width:175px;">Thành viên (id)</td>
                            <td style="width:90px;">Số tiền</td>
                            <td>Hình thức</td>
                            <td>Vận chuyển</td>
                            <td style="width:100px;">Giao dịch</td>
                            <td style="width:75px;">Ngày tạo</td>
                            <td style="width:55px;">Hành động</td>
                        </tr>
                        </thead>

                        <tfoot class="auto_check_pages">
                        <tr>
                            <td colspan="8">
                                <div class="list_action itemActions">
                                    <a href="#submit" id="submit" class="button blueB"
                                       url="admin/tran/del_all.html">
                                        <span style='color:white;'>Xóa hết</span>
                                    </a>
                                </div>

                                <div class='pagination'>
                                    &nbsp;<strong>1</strong>&nbsp;<a href="admin/tran/index/10">2</a>&nbsp;<a
                                            href="admin/tran/index/10">Trang kế tiếp</a>&nbsp;
                                </div>
                            </td>
                        </tr>
                        </tfoot>

                        <tbody class="list_item">
                        @foreach($transaction as $transaction)
                            <tr class='row_21'>
                                <td><input type="checkbox" name="id[]" value="{{$transaction->id}}"/></td>

                                <td class="textC">{{$transaction->id}}</td>

                                <td>
                                    {{$transaction->fullname}} ({{$transaction->user_id}})
                                </td>

                                <td class="textR red">{{number_format($transaction->total)}}</td>

                                <td>
                                    {{$transaction->payment}}
                                </td>

                                <td>
                                    {{number_format($transaction->delivery_fee)}}
                                </td>

                                @if(!$transaction->status)
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

                                <td class="textC">{{$transaction->created_at}}</td>

                                <td class="textC">
                                    <a href="{{route('admin.transaction.getOrder', $transaction->id)}}" class="tipS">
                                        <img src="{{ asset('admin/images/icons/color/view.png') }}"/>
                                    </a>

                                    <a href="{{route('admin.transaction.getDelete', $transaction->id)}}" title="Xóa" class="tipS verify_action">
                                        <img src="{{ asset('admin/images/icons/color/delete.png') }}"/>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

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
    <div class="clear"></div>
@endsection
