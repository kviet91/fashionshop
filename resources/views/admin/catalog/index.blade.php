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
        <!-- Common -->
        <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Danh mục</h5>
                    <span>Quản lý thể loại</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li><a href="{{route('admin.catalog.getAdd')}}">
                                <img src="{{ asset('admin/images/icons/control/16/add.png') }}"/>
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="{{route('admin.catalog')}}">
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

            <!-- Static table -->
            <div class="widget" id='main_content'>

                <div class="title">
                    <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"/></span>
                    <h6>Danh sách Danh mục</h6>
                    <div class="num f12">Tổng số: <b>{{count($catalog)}}</b></div>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget"
                       id="checkAll">
                    <thead>
                    <tr>
                        <td style="width:21px;"><img src="{{ asset('admin/images/icons/tableArrows.png') }}"/></td>
                        <td>Tên</td>
                        <td style="width:150px;">Hành động</td>
                    </tr>
                    </thead>

                    <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="3">
                            <div class="list_action itemActions">
                                <a href="#submit" id="submit" class="button blueB" url="admin/cat/del_all.html">
                                    <span style='color:white;'>Xóa hết</span>
                                </a>
                            </div>

                            <div class='pagination'>
                                &nbsp;<strong>1</strong>&nbsp;<a href="admin/cat/index/10">2</a>&nbsp;<a
                                        href="admin/cat/index/10">Trang kế tiếp</a>&nbsp;
                            </div>
                        </td>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($catalog as $row)
                        <tr class='row_18'>
                            <td><input type="checkbox" name="id[]" value="{{$row->id}}"/></td>

                            <td>{{$row->name}}</td>
                            <td class="option">
                                <a href="{{route('admin.catalog.getEdit', $row['id'])}}" title="Chỉnh sửa" class="tipS ">
                                    <img src="{{ asset('admin/images/icons/color/edit.png') }}"/>
                                </a>

                                <a href="{{route('admin.catalog.getDelete', $row['id'])}}" title="Xóa"
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