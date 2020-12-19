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
                        <li><a href="admin/home/logout.html">
                                <img src="{{ asset('admin/images/icons/topnav/logout.png') }}" alt=""/>
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
                    var main = $('#main_product');

                    // Tips
                    main.find('.tipN').tipsy({gravity: 'n', fade: false, html: true});
                    main.find('.tipS').tipsy({gravity: 's', fade: false, html: true});
                    main.find('.tipW').tipsy({gravity: 'w', fade: false, html: true});
                    main.find('.tipE').tipsy({gravity: 'e', fade: false, html: true});

                    // Tooltip
                    main.find('[_tooltip]').nstUI({
                        method: 'tooltip'
                    });
                });
            })(jQuery);
        </script>
        <!-- Common view -->
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
                        <li><a href="{{route('admin.product.getAdd')}}">
                                <img src="{{ asset('admin/images/icons/control/16/add.png') }}"/>
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="admin/product.html">
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
        <div class="wrapper" id="main_product">
            <div class="widget">

                <div class="title">
                    <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"/></span>
                    <h6>
                        Danh sách sản phẩm </h6>
                    <div class="num f12">Số lượng: <b>{{count($product)}}</b></div>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">

                    <thead class="filter">
                    <tr>
                        <td colspan="6">
                            <form class="list_filter form" action="index.php/admin/product.html" method="get">
                                <table cellpadding="0" cellspacing="0" width="80%">
                                    <tbody>

                                    <tr>
                                        <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
                                        <td class="item"><input name="id" value="" id="filter_id" type="text"
                                                                style="width:55px;"/></td>

                                        <td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
                                        <td class="item" style="width:155px;"><input name="name" value=""
                                                                                     id="filter_iname" type="text"
                                                                                     style="width:155px;"/></td>

                                        <td class="label" style="width:60px;"><label for="filter_status">Thể
                                                loại</label></td>
                                        <td class="item">
                                            <select name="catalog">
                                                <option value=""></option>
                                                <!-- kiem tra danh muc co danh muc con hay khong -->
                                                    @foreach($catalog as $catalog)
                                                    <option value="{{$catalog->id}}">
                                                        {{$catalog->name}}
                                                    </option>
                                                    @endforeach
                                            </select>
                                        </td>

                                        <td style='width:150px'>
                                            <input type="submit" class="button blueB" value="Lọc"/>
                                            <input type="reset" class="basic" value="Reset"
                                                   onclick="window.location.href = 'index.php/admin/product.html'; ">
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </td>
                    </tr>
                    </thead>

                    <thead>
                    <tr>
                        <td style="width:21px;"><img src="{{ asset('admin/images/icons/tableArrows.png') }}"/></td>
                        <td style="width:60px;">Mã số</td>
                        <td>Tên</td>
                        <td>Giá</td>
                        <td style="width:75px;">Ngày tạo</td>
                        <td style="width:120px;">Hành động</td>
                    </tr>
                    </thead>

                    <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="6">
                            <div class="list_action itemActions">
                                <a href="#submit" id="submit" class="button blueB" url="admin/product/del_all.html">
                                    <span style='color:white;'>Xóa hết</span>
                                </a>
                            </div>

                            <div class='pagination'>
                            </div>
                        </td>
                    </tr>
                    </tfoot>

                    <tbody class="list_item">
                    @foreach($product as $product)
                        <tr class='row_9'>
                            <td><input type="checkbox" name="id[]" value="{{$product->id}}"/></td>

                            <td class="textC">{{$product->id}}</td>

                            <td>
                                <div class="image_thumb">
                                    <img src="{{ asset('source/img') }}/{{ $product->img_link }}" height="50">
                                    <div class="clear"></div>
                                </div>

                                <a href="product1/view/9.html" class="tipS" title="" target="_blank">
                                    <b>{{$product->name}}</b>
                                </a>

                                <div class="f11">
                                    Số lượng: {{$product->count}} | Đã bán: {{$product->count_buy}} | Xem: {{$product->views}}
                                </div>

                            </td>

                            <td class="textR">
                                {{number_format($product->price)}}

                            </td>


                            <td class="textC">{{$product->created_at}}</td>

                            <td class="option textC">
                                <a href="product1/view/9.html" target='_blank' class='tipS'
                                   title="Xem chi tiết sản phẩm">
                                    <img src="{{ asset('admin/images/icons/color/view.png') }}"/>
                                </a>
                                <a href="{{route('admin.product.getEdit')}}" title="Chỉnh sửa" class="tipS">
                                    <img src="{{ asset('admin/images/icons/color/edit.png') }}"/>
                                </a>

                                <a href="{{route('admin.product.getDelete', $product->id)}}" title="Xóa"
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