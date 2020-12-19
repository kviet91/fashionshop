<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>E-SHOP</title>

    <meta name="robots" content="noindex, nofollow"/>


    <link rel="shortcut icon" href="{{asset('admin/images/icon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/crown/css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/css.css')}}" media="screen"/>

    <script type="text/javascript">
        var admin_url = '';
        var base_url = '';
        var public_url = '';
    </script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{asset('admin/js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/jquery/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/spinner/jquery.mousewheel.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/forms/uniform.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/forms/jquery.tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/forms/autogrowtextarea.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/forms/jquery.maskedinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/forms/jquery.inputlimiter.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/tables/datatable.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/tables/tablesort.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/tables/resizable.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/ui/jquery.tipsy.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/ui/jquery.collapsible.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/ui/jquery.progress.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/ui/jquery.timeentry.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/ui/jquery.colorpicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/ui/jquery.jgrowl.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/ui/jquery.breadcrumbs.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/plugins/ui/jquery.sourcerer.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/crown/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/jquery/chosen/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/jquery/scrollTo/jquery.scrollTo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/jquery/number/jquery.number.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('admin/js/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/jquery/zclip/jquery.zclip.js') }}"></script>

    <script type="text/javascript" src="{{ asset('admin/js/jquery/colorbox/jquery.colorbox.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/jquery/colorbox/colorbox.css') }}" media="screen"/>

    <script type="text/javascript" src="{{ asset('admin/js/custom_admin.js') }}" type="text/javascript"></script>
</head>

<body>

<!-- Left side content -->
<div id="left_content">
    <div id="leftSide" style="padding-top:30px;">

        <!-- Account panel -->

        <div class="sideProfile">
            <a href="#" title="" class="profileFace"><img width="40" src="{{ asset('admin/images/user.png') }}"/></a>
            <span>Xin chào: <strong>Admin!</strong></span>
            <span>{{ Auth::user()->fullname }}</span>
            <div class="clear"></div>
        </div>
        <div class="sidebarSep"></div>
        <!-- Left navigation -->

        <ul id="menu" class="nav">

            <li class="home">

                <a href="{{route('admin.index')}}" class="active" id="current">
                    <span>Bảng điều khiển</span>
                    <strong></strong>
                </a>


            </li>
            <li class="tran">

                <a href="admin/tran.html" class=" exp">
                    <span>Quản lý bán hàng</span>
                    <strong>1</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="{{route('admin.transaction')}}">
                            Giao dịch </a>
                    </li>

                </ul>

            </li>
            <li class="product">

                <a href="" class=" exp">
                    <span>Sản phẩm</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="{{route('admin.product')}}">
                            Sản phẩm </a>
                    </li>
                    <li>
                        <a href="{{route('admin.catalog')}}">
                            Danh mục </a>
                    </li>
                </ul>

            </li>
            <li class="account">

                <a href="admin/account.html" class=" exp">
                    <span>Tài khoản</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="{{route('admin.user')}}">
                            Ban quản trị </a>
                    </li>
                    <li>
                        <a href="{{route('admin.user')}}">
                            Thành viên </a>
                    </li>
                </ul>

            </li>
            <li class="content">

                <a href="admin/content.html" class=" exp">
                    <span>Nội dung</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li>
                        <a href="{{route('admin.slide')}}">
                            Slide </a>
                    </li>

                    <li>
                        <a href="{{route('admin.comment')}}">
                            Phản hồi </a>
                    </li>
                </ul>

            </li>

        </ul>

    </div>
    <div class="clear"></div>
</div>

<div class="content">
    @yield('content')
</div>

<div class="clear"></div>
</body>
</html>