@extends('admin.master')

@section('content')
    <!-- Right side -->
    <div id="rightSide">

        <!-- Account panel top -->

        <div class="topNav">
            <div class="wrapper">

                <div class="userNav">
                    <ul>
                        <li><a href="http://localhost/webphp/" target="_blank">
                                <img style="margin-top:7px;" src="{{ asset('admin/images/icons/light/home.png') }}"/>
                                <span>Trang chủ</span>
                            </a></li>

                        <!-- Logout -->
                        <li><a href="home/logout.html">
                                <img src="{{ asset('admin/images/icons/topnav/logout.png')}}" alt=""/>
                                <span>Đăng xuất</span>
                            </a></li>

                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>

        <!-- Main content -->

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    var main = $('#form');

                    // Tabs
                    main.contentTabs();
                });
            })(jQuery);
        </script>

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

                        <li><a href="{{route('admin.user')}}">
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

            <!-- Form -->
            <form class="form" id="form" action="{{route('admin.user.getAdd')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="widget">
                        <div class="title">
                            <img src="{{ asset('admin/images/icons/dark/add.png') }}" class="titleIcon"/>
                            <h6>Thêm mới Thành viên</h6>
                        </div>

                        <div class="tab_container">
                            <div id='tab1' class="tab_content pd0">
                                <div class="formRow">
                                    <label class="formLeft" for="param_name">Username:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input name="username" value="{{old('username')}}"
                                                                    id="param_name"
                                                                    _autocheck="true"
                                                                    type="text"/></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label class="formLeft" for="param_name">Họ và Tên:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input name="name" value="{{old('name')}}" id="param_name"
                                                                    _autocheck="true"
                                                                    type="text"/></span>
                                        <span name="name_autocheck" class="autocheck"></span>
                                        <div name="name_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label class="formLeft" for="param_name">Địa chỉ Email:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input name="email" value="{{old('email')}}" id="param_name"
                                                                    _autocheck="true"
                                                                    type="text"/></span>
                                        <span name="name_autocheck" class="autocheck"></span>
                                        <div name="name_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label class="formLeft" for="param_name">Mật khẩu:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input name="password" value="{{old('password')}}" id="param_name"
                                                                    _autocheck="true"
                                                                    type="password"/></span>
                                        <span name="name_autocheck" class="autocheck"></span>
                                        <div name="name_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label class="formLeft" for="param_name">Nhập lại mật khẩu:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input name="re-password" value="{{old('re-password')}}" id="param_name"
                                                                    _autocheck="true"
                                                                    type="password"/></span>
                                        <span name="name_autocheck" class="autocheck"></span>
                                        <div name="name_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label class="formLeft" for="param_name">Số điện thoại:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input name="phone" value="{{old('phone')}}" id="param_name"
                                                                    _autocheck="true"
                                                                    type="text"/></span>
                                        <span name="name_autocheck" class="autocheck"></span>
                                        <div name="name_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label class="formLeft" for="param_name">Địa chỉ:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input name="address" value="{{old('address')}}" id="param_name"
                                                                    _autocheck="true"
                                                                    type="text"/></span>
                                        <span name="name_autocheck" class="autocheck"></span>
                                        <div name="name_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <!-- warranty -->
                                <div class="formRow hide"></div>
                            </div>

                        </div><!-- End tab_container-->

                        <div class="formSubmit">
                            <input type="submit" value="Thêm mới" class="redB"/>
                            <input type="reset" value="Hủy bỏ" class="basic"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
            </form>
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