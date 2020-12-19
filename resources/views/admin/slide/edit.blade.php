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

        <!-- head -->

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
        <!-- Message -->
        @include('admin.notify')

        <div class="line"></div>

        <!-- head -->

        <div class="wrapper">

            <!-- Form -->
            <form enctype="multipart/form-data" method="post" action="{{route('admin.slide')}}" id="form" class="form">
                @csrf
                <fieldset>
                    <div class="widget">
                        <div class="title">
                            <img class="titleIcon" src="{{ asset('admin/images/icons/dark/add.png') }}">
                            <h6>Cập nhật Slide</h6>
                        </div>

                        <div class="tab_container">
                            <div class="tab_content pd0" id="tab1" style="display: block;">
                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Tên slide<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_name"
                                                                    value="{{old('name', isset($slide)? $slide['name']:null)}}"
                                                                    name="name"></span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>


                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Link:</label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_link"
                                                                    value="{{old('link', isset($slide)? $slide['img_link']:null)}}"
                                                                    name="link"></span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Title:</label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_info"
                                                                    value="{{old('title', isset($slide)? $slide['title']:null)}}"
                                                                    name="title"></span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Mô tả:</label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_info"
                                                                    value="{{old('info', isset($slide)? $slide['description']:null)}}"
                                                                    name="info"></span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow hide"></div>
                            </div>


                        </div><!-- End tab_container-->

                        <div class="formSubmit">
                            <input type="submit" class="redB" value="Cập nhật">
                            <input type="reset" class="basic" value="Hủy bỏ">
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
@endsection
