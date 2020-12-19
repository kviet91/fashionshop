<footer id="footer" class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <!-- footer logo -->
                    <div class="footer-logo">
                        <a class="logo" href="#">
                            <img src="source/img/logo.png" alt="" style="width: 100px">
                        </a>
                    </div>
                    <!-- /footer logo -->

                    <p>E-Shop là trang web bán hàng uy tín, với hỗ trợ giao hàng tận nơi, thanh toán nhanh chóng. Là website đươc nhiều người ưa chuộng</p>

                    <!-- footer social -->
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                    <!-- /footer social -->
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Tài khoản của tôi</h3>
                    <ul class="list-links">
                        @if (Route::has('login'))
                            @auth
                                @if(Auth::user()->status == 0)
                                    <li><a href="{{ url('/home') }}"><i></i> Tài khoản</a></li>

                                @elseif(Auth::user()->status == 1)
                                    <li><a href="{{ url('/homeadmin') }}"></i> Giỏ hàng</a></li>

                                @endif
                            @endauth
                        @endif
                        <li><a href="{{route('checkout')}}"> Giỏ hàng </a></li>
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">VỀ CHÚNG TÔI</h3>
                    <ul class="list-links">
                        <li><a href="{{route('about-us')}}">Giới thiệu</a></li>
                        <li><a href="#">Điều khoản sử dụng </a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                        <li><a href="#"> Giúp đỡ</a></li>

                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Liên hệ</h3>
                    <p>Nhận thông báo về cửa hàng</p>
                    <form action="{{ url('lien-he') }}" method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        <div class="form-group">
                            <input name="name" class="input" placeholder="Nhập địa chỉ email của bạn" required>
                        </div>
                        <button class="primary-btn">Gửi</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /row -->
        <hr>
        <!-- row -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <!-- footer copyright -->
                <div class="footer-copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy; <script>document.write(new Date().getFullYear());</script> Bản quyền thuộc về <i class="fa fa-heart-o" aria-hidden="true"></i> Nguyễn Thanh Dịu - Phan Đức Bảo - Nguyễn Thị Vân Anh
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
                <!-- /footer copyright -->
            </div>
        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</footer>
<!-- jQuery Plugins -->
