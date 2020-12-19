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
        </div><!-- head -->
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <!-- Message -->
        @include('admin.notify')

        <div class="wrapper">
            <div class="widget">
                <div class="title">
                    <h6>Chỉnh sửa danh mục sản phẩm</h6>
                </div>

                <form id="form" class="form" enctype="multipart/form-data" method="post"
                      action="{{route('admin.catalog.getEdit', $catalog->id)}}">
                    @csrf
                    <fieldset>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_name"
                                                            value="{{old('name', isset($catalog)? $catalog['name']: null)}}"
                                                            name="name"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Danh mục cha:</label>
                            <div class="formRight">
    		<span class="oneTwo">
        		<select _autocheck="true" id="param_parent_id" name="parent_id">
        		     <option value="1">ĐỒ NAM</option>
        		     <option value="2">ĐỒ NỮ</option>
        		     <option value="3">TRẺ EM</option>
        		     <option value="4">PHỤ KIỆN</option>

        		</select>
    		</span>
                                <span class="autocheck" name="parent_id_autocheck"></span>
                                <div class="clear error" name="parent_id_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_meta_desc" class="formLeft">Mô Tả:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc"
                                                               name="meta_desc">{{ old('meta_desc', isset($catalog) ? $catalog['description']: null) }}</textarea></span>
                                <span class="autocheck" name="meta_desc_autocheck"></span>
                                <div class="clear error" name="meta_desc_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <div class="formSubmit">
                            <input type="submit" class="redB" value="Cập nhật">
                        </div>
                    </fieldset>
                </form>

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