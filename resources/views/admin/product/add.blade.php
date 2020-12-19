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
                    <h5>Sản phẩm</h5>
                    <span>Quản lý sản phẩm</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li><a href="product1/add.html">
                                <img src="{{ asset('admin/images/icons/control/16/add.png') }}"/>
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="product.html">
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
            <form class="form" id="form" action="{{route('admin.product.getAdd')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="widget">
                        <div class="title">
                            <img src="{{ asset('admin/images/icons/dark/add.png') }}" class="titleIcon"/>
                            <h6>Thêm mới Sản phẩm</h6>
                        </div>

                        <div class="tab_container">
                            <div id='tab1' class="tab_content pd0">
                                <div class="formRow">
                                    <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
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
                                    <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <div class="left"><input type="file" id="image" name="image"
                                                                 value="{{old('image')}}" multiple></div>
                                        <div name="image_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label class="formLeft">Ảnh kèm theo:</label>
                                    <div class="formRight">
                                        <div class="left"><input type="file" id="image_list" name="image_list"
                                                                 value=""
                                            ></div>
                                        <div name="image_list_error" class="clear error"></div>
                                    </div>
                                    <div class="formRight">
                                        <div class="left"><input type="file" id="image_list" name="image_list"
                                                                 value=""
                                            ></div>
                                        <div name="image_list_error" class="clear error"></div>
                                    </div>
                                    <div class="formRight">
                                        <div class="left"><input type="file" id="image_list" name="image_list"
                                                                 value=""
                                            ></div>
                                        <div name="image_list_error" class="clear error"></div>
                                    </div>
                                    <div class="formRight">
                                        <div class="left"><input type="file" id="image_list" name="image_list"
                                                                 value=""
                                            ></div>
                                        <div name="image_list_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <!-- Price -->
                                <div class="formRow">
                                    <label class="formLeft" for="param_price">
                                        Giá :
                                        <span class="req">*</span>
                                    </label>
                                    <div class="formRight">
		<span class="oneTwo">
			<input name="price" value="{{old('price')}}" style='width:100px' id="param_price" class="format_number"
                   _autocheck="true"
                   type="text"/>
			<img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px'
                 src='{{ asset('admin/crown/images/icons/notifications/information.png') }}'/>
		</span>
                                        <span name="price_autocheck" class="autocheck"></span>
                                        <div name="price_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <!-- Price -->
                                <div class="formRow">
                                    <label class="formLeft" for="param_discount">
                                        Giảm giá (%)
                                        <span></span>:
                                    </label>
                                    <div class="formRight">
		<span>
			<input name="discount" value="{{old('discount')}}" style='width:100px' id="param_discount"
                   class="format_number" type="text"/>
			<img class='tipS' title='Số tiền giảm giá' style='margin-bottom:-8px'
                 src='{{ asset('admin/crown/images/icons/notifications/information.png') }}'/>
		</span>
                                        <span name="discount_autocheck" class="autocheck"></span>
                                        <div name="discount_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <!-- Price -->
                                <div class="formRow">
                                    <label class="formLeft" for="param_discount">
                                        Số lượng:
                                        <span class="req">*</span>
                                    </label>
                                    <div class="formRight">
		<span>
			<input name="count" value="{{old('count')}}" style='width:100px' id="param_discount" class="format_number"
                   type="text"/>
			<img class='tipS' title='Số lượng sản phẩm' style='margin-bottom:-8px'
                 src='{{ asset('admin/crown/images/icons/notifications/information.png') }}'/>
		</span>
                                        <span name="discount_autocheck" class="autocheck"></span>
                                        <div name="discount_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label class="formLeft" for="param_discount">
                                        Trạng thái:
                                        <span class="req">*</span>
                                    </label>
                                    <div class="formRight">
		<span>
			<input name="status" value="{{old('status')}}" style='width:100px' id="param_discount" class="format_number"
                   type="text"/>
			<img class='tipS' title='Sản phẩm mới hay cũ' style='margin-bottom:-8px'
                 src='{{ asset('admin/crown/images/icons/notifications/information.png') }}'/>
		</span>
                                        <span name="discount_autocheck" class="autocheck"></span>
                                        <div name="discount_error" class="clear error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label for="param_meta_desc" class="formLeft">Mô Tả:</label>
                                    <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc"
                                                               name="meta_desc"></textarea></span>
                                        <span class="autocheck" name="meta_desc_autocheck"></span>
                                        <div class="clear error" name="meta_desc_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label class="formLeft" for="param_cat">Danh mục:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <select name="cat" _autocheck="true" id='param_cat' class="left">
                                            <option value="">Lựa chọn danh mục</option>
                                            <!-- kiem tra danh muc co danh muc con hay khong -->
                                            @foreach($catalog as $catalog)
                                                <option value="{{$catalog->id}}">
                                                    {{$catalog->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span name="cat_autocheck" class="autocheck"></span>
                                        <div name="cat_error" class="clear error"></div>
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