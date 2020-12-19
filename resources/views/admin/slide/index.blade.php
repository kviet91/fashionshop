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
                        <li><a href="{{route('logout')}}">
                                <img src="{{ asset('admin/images/icons/topnav/logout.png') }}" alt=""/>
                                <span>Đăng xuất</span>
                            </a></li>

                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>

        <!-- head -->

        <div class="line"></div>
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Slide</h5>
                    <span>Quản lý slide</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li><a href="{{route('admin.slide.getAdd')}}">
                                <img src="{{ asset('admin/images/icons/control/16/add.png') }}"/>
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="{{route('admin.slide')}}">
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

        <div id="main_slide" class="wrapper">
            <div class="widget">

                <div class="title">
                    <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
                    <h6>
                        Danh sách slide
                    </h6>

                    <div class="num f12">Số lượng: <b>{{count($slide)}}</b></div>
                </div>

                <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">

                    <thead>
                    <tr>
                        <td style="width:21px;"><img src="{{ asset('admin/images/icons/tableArrows.png') }}"></td>
                        <td style="width:60px;">Mã số</td>
                        <td>Tiêu đề</td>
                        <td style="width:75px;">Thứ tự</td>
                        <td style="width:120px;">Hành động</td>
                    </tr>
                    </thead>

                    <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="6">
                            <div class="list_action itemActions">
                                <a url="" class="button blueB" id="submit" href="#submit">
                                    <span style="color:white;">Xóa hết</span>

                                </a>
                            </div>
                            <p>Nên dùng 4 đến 6 ảnh slide để giao diện slide hiện thị tốt nhất</p>

                        </td>
                    </tr>
                    </tfoot>

                    <tbody class="list_item">
                    @foreach($slide as $slide)

                        <tr class="row_">
                            <td><input type="checkbox" value="" name="id[]"></td>

                            <td class="textC">{{$slide->id}}</td>

                            <td>
                                <div class="image_thumb">
                                    <img height="50" src="{{ asset('source/img/slide/') }}/{{ $slide->img_link }}">
                                    <div class="clear"></div>
                                </div>

                                <a target="_blank" title="" class="tipS" href="">
                                    <b></b>
                                </a>

                            </td>
                            <td></td>

                            <td class="option textC">
                                <a title="Xem chi tiết link" class="tipS" target="_blank" href="">
                                    <img src="{{ asset('admin/images/icons/color/view.png') }}">
                                </a>

                                <a class="tipS" title="Chỉnh sửa" href="{{route('admin.slide.getEdit', $slide->id)}}">
                                    <img src="{{ asset('admin/images/icons/color/edit.png') }}">
                                </a>

                                <a class="tipS verify_action" title="Xóa"
                                   href="{{route('admin.slide.getDelete', $slide->id)}}">
                                    <img src="{{ asset('admin/images/icons/color/delete.png') }}">
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