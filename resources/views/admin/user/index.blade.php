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
                        <li><a href="http://localhost/webphp/" target="_blank">
                                <img style="margin-top:7px;" src="{{ asset('admin/images/icons/light/home.png') }}"/>
                                <span>Trang chủ</span>
                            </a></li>

                        <!-- Logout -->
                        <li><a href="home/logout.html">
                                <img src="{{ asset('admin/images/icons/topnav/logout.png') }}" alt=""/>
                                <span>Đăng xuất</span>
                            </a></li>

                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>

        <!-- Main content -->
        <!-- Common view -->
        <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Thành viên</h5>
                    <span>Quản lý thành viên</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li><a href="{{route('admin.user.getAdd')}}">
                                <img src="{{ asset('admin/images/icons/control/16/add.png') }}"/>
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="user.html">
                                <img src="{{ asset('admin/images/icons/control/16/list.png') }}"/>
                                <span>Danh sách</span>
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
                    <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"/></span>
                    <h6>Danh sách Thành viên</h6>
                    <div class="num f12">Tổng số: <b>{{count($user)}}</b></div>
                </div>

                <form action="http://localhost/webphp/index.php/admin/user.html" method="get" class="form"
                      name="filter">
                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck"
                           id="checkAll">
                        <thead>
                        <tr>
                            <td style="width:10px;"><img src="{{asset('admin/images/icons/tableArrows.png')}}"/></td>
                            <td style="width:80px;">Mã số</td>
                            <td>Tên</td>
                            <td>Email</td>
                            <td>Điện thoại</td>
                            <td>Địa chỉ</td>
                            <td style="width:100px;">Hành động</td>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="list_action itemActions">
                                    <a href="#submit" id="submit" class="button blueB" url="user/del_all.html">
                                        <span style='color:white;'>Xóa hết</span>
                                    </a>
                                </div>

                                <div class='pagination'>
                                </div>
                            </td>
                        </tr>
                        </tfoot>

                        <tbody>
                        <!-- Filter -->
                        @foreach($user as $user)
                            <tr>
                                <td><input type="checkbox" name="id[]" value="{{$user->id}}"/></td>

                                <td class="textC">{{$user->id}}</td>


                                <td><span title="{{$user->fullname}}" class="tipS">
							{{$user->fullname}}						</span></td>


                                <td><span title="{{$user->email}}" class="tipS">
							{{$user->email}}						</span></td>

                                <td>
                                    {{$user->phone}}                        </td>

                                <td>
                                    {{$user->address}}                        </td>


                                <td class="option">
                                    <a href="{{route('admin.user.getEdit', $user->id)}}" title="Chỉnh sửa" class="tipS ">
                                        <img src="{{ asset('admin/images/icons/color/edit.png') }}"/>
                                    </a>

                                    <a href="{{route('admin.user.getDelete', $user->id)}}" title="Xóa"
                                       class="tipS verify_action">
                                        <img src="{{ asset('admin/images/icons/color/delete.png') }}"/>
                                    </a>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="clear mt30"></div>

        <!-- Footer -->
        <div id="footer">
            <div class="wrapper">
                <div>Bản quyền © E-SHOP 2012</div>
            </div>
        </div>
    </div>
@endsection