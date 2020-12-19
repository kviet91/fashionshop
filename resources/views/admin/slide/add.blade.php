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

        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>



        <div class="wrapper">

            <!-- Message -->
        @include('admin.notify')

            <!-- Form -->
            <form enctype="multipart/form-data" method="post" action="{{route('admin.slide.getAdd')}}" id="form"
                  class="form">
                @csrf
                <fieldset>
                    <div class="widget">
                        <div class="title">
                            <img class="titleIcon" src="{{ asset('admin/images/icons/dark/add.png') }}">
                            <h6>Thêm mới slide</h6>
                        </div>

                        <div class="tab_container">
                            <div class="tab_content pd0" id="tab1" style="display: block;">
                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Tên slide:<span
                                                class="req">*</span></label>
                                    <div class="formRight">
                            		<span class="oneTwo">
                                    <input type="text" _autocheck="true" id="param_name" name="name">
                                    <p>Để hiện thị tốt kích thước ảnh tối thiểu 720 X 420</p>
                                    </span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <div class="left"><input type="file" id="image" name="image"
                                                                 value="{{old('image')}}"></div>
                                        <div name="image_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>


                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Title:</label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_link"
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
                                                                    name="desc"></span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow hide"></div>
                            </div>


                        </div><!-- End tab_container-->

                        <div class="formSubmit">
                            <input type="submit" class="redB" value="Thêm mới">
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