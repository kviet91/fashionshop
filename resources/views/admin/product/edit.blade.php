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
        <!-- Message -->
<!-- head -->
<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="{{ asset('admin//images/icons/dark/add.png') }}">
                    <h6>Cập nhật Sản phẩm</h6>
                </div>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1" style="display: block;">
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="" name="name"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Slug:</label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" value="" _autocheck="true" id="param_name" name="slug"></span>

                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"></div>
                            </div>
                            <p class="formRight">Nhập slug nếu muốn thay đổi</p>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <div class="left">
                                    <!-- <input type="file" name="image" id="image" size="25"> -->
                                    <input type="text" name="image" id="image" value="" size="50">
                                    <p>Để hiển thị tốt kích thước ảnh tối thiểu 720 X 960</p>
                                </div>
                                <input type="button" id="btn-browse-image" datainput="image" onclick="BrowseServer(this)" value="Browse" style="display: inline-block;">
                                <input type="button" id="btn-delete-image"  value="Delete" style="display: inline-block;">
                                <div class="clear error" name="image_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft">Ảnh kèm theo:</label>
                            <div class="formRight">
                                <div class="left">

                                    <input type="text" name="image_list[]" id="" value="" size="50">
                                    <img src="" width="100px" alt=""  style="display: block">
                                </div>
                                <input type="button" id="btn-browse-image" datainput="" onclick="BrowseServer(this)" value="Browse" style="display: inline-block;">
                                <input type="button" id="btn-delete-image"  value="Delete" style="display: inline-block;">

                                <div class="clear error" name="image_list_error"></div>
                            </div>
                            <span class="add-image btn-add-image">Add image</span>
                            <div class="clear"></div>
                        </div>
                        <script>
                            jQuery(document).ready(function($) {
                                var idInput = 1;
                                jQuery('.btn-add-image').on('click',function(){
                                    var inputAdd = jQuery(this).parent().find('.formRight').last().clone(true);
                                    var lastIdInput = inputAdd.find('input[type=text]').attr('id');
                                    lastIdInput = lastIdInput.replace(/[^0-9]/g,'');
                                    lastIdInput = parseInt(lastIdInput) + idInput;

                                    inputAdd.find('input[type=text]').attr('id','image_list'+lastIdInput);
                                    inputAdd.find('input[type=button]').attr('datainput','image_list'+lastIdInput);
                                    inputAdd.find('img').remove();
                                    inputAdd.find('input[type=text]').attr('value','');
                                    inputAdd.insertBefore(this);
                                    idInput++;


                                });

                                $( document ).on( 'click', '#btn-delete-image', function() {
                                    var deleteSure = confirm("Bạn chắc chắn muốn xóa");

                                    if (deleteSure == true) {
                                        console.log(jQuery(this).parent().parent().find('.formRight'));
                                        if(jQuery(this).parent().parent().find('.formRight').length == 1){
                                            jQuery(this).parent().find('img').remove();
                                            jQuery(this).parent().find('input[type=text]').attr('value','');
                                        }
                                        else
                                            jQuery(this).parent().remove();
                                    }

                                });
                            });
                        </script>

                        <!-- Price -->
                        <div class="formRow">
                            <label for="param_price" class="formLeft">
                                Giá :
                            </label>
                            <div class="formRight">
		<span class="oneTwo">
			<input type="text" value="" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="price">
			<img src="{{ asset('admin//crown/images/icons/notifications/information.png') }}" style="margin-bottom:-8px" class="tipS" original-title="Giá bán sử dụng để giao dịch">
		</span>
                                <span class="autocheck" name="price_autocheck"></span>
                                <div class="clear error" name="price_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_price" class="formLeft">
                                Giảm Giá :
                            </label>
                            <div class="formRight">
		<span class="oneTwo">
			<input type="text" value="" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="discount">
			<img src="{{ asset('admin//crown/images/icons/notifications/information.png') }}" style="margin-bottom:-8px" class="tipS" original-title="Giá bán sử dụng để giao dịch">
		</span>
                                <span class="autocheck" name="price_autocheck"></span>
                                <div class="clear error" name="price_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Tình trạng:</label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_ma_sp" value="" name="status"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>



                        <div class="formRow">
                            <label for="param_cat" class="formLeft">Thể loại:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="catalog"  class="left" >
                                    <option value=""></option>
                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                </select>
                                <span class="autocheck" name="cat_autocheck"></span>
                                <div class="clear error" name="cat_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <!-- Thương hiệu -->
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Thương hiệu:(nếu có thì nhập vào)</label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" value="" _autocheck="true" id="param_name" name="ma_sp"></span>
                                <span class="autocheck" name="ma_sp_autocheck"></span>
                                <div class="clear error" name="ma_sp_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_warranty" class="formLeft">
                                Đặt làm sản phẩm nổi bật :
                            </label>
                            <div class="formRight">
                                <select name="noi_bat" id="noi_bat">
                                    <option value="0">Không</option>
                                    <option value="1">Có</option>
                                </select>
                                <div class="clear error" name="hsx_error"></div>
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
    <div class="clear"></div>
@endsection