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
                                <img style="margin-top:7px;" src="images/icons/light/home.png"/>
                                <span>Trang chủ</span>
                            </a></li>

                        <!-- Logout -->
                        <li><a href="admin/home/logout.html">
                                <img src="images/icons/topnav/logout.png" alt=""/>
                                <span>Đăng xuất</span>
                            </a></li>

                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>

        <!-- Main content -->

        <!-- Common -->
        <!-- Title area -->
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Phản hồi</h5>
                    <span>Quản lý phản hồi</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>


        <!-- Message -->

    @include('admin.notify')
    <!-- Main content wrapper -->
        <div class="wrapper">

            <!-- Static table -->
            <div class="widget">

                <div class="title">
                    <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"/></span>
                    <h6>Danh sách Phản hồi</h6>
                    <div class="num f12"><b>0</b> Phản hồi</div>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget"
                       id="checkAll">
                    <thead>
                    <tr>
                        <td style="width:21px;"><img src="images/icons/tableArrows.png"/></td>
                        <td style="width:240px;">Tên</td>
                        <td style="width:240px;">Sản phẩm</td>
                        <td>Nội dung</td>
                        <td style="width:90px;">Ngày tạo</td>
                        <td style="width:80px;">Hành động</td>
                    </tr>
                    </thead>

                    <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="6">
                            <div class="list_action itemActions">
                                <a href="#submit" id="submit" class="button blueB" url="admin/comment/del_all.html">
                                    <span style='color:white;'>Xóa hết</span>
                                </a>
                            </div>

                            <div class='pagination'>
                            </div>
                        </td>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($comment as $comment)

                        <tr class='row_1'>
                            <td><input type="checkbox" name="{{$comment->id}}" value="{{$comment->id}}"/></td>

                            <td>
                                <a class="wUserPic" title="" href="#"><img src='images/user.png' width='60px'
                                                                           align='left'/></a>
                                <ul class="leftList">
                                    <li>
                                        <a href='mailto:{{$comment->user->email}}'><strong>{{$comment->user->email}}</strong></a>
                                    </li>
                                    <li>{{$comment->user->fullname}}</li>
                                </ul>
                            </td>

                            <td>
                                <div class="image_thumb">
                                    <img src="{{asset('source/img') }}/{{ $comment->product->img_link }}" height="50">
                                    <div class="clear"></div>
                                </div>

                                <a href="product1/view/7.html" class="tipS" title="" target="_blank">
                                    <b>{{$comment->product->name}}</b>
                                </a>
                            </td>

                            <td>
                                <a href="" target="_blank">
                                    <strong> </strong>
                                </a>
                                <br>
                                {{$comment->content}} <span
                                        style='color:#006400'>(<strong>Rate:</strong> {{$comment->rate}})</span>
                            </td>

                            <td class="textC">{{$comment->created_at}}</td>

                            <td class="option">
                                <a href="{{route('detail', $comment->product->id)}}" title="Xem" class="tipS">
                                    <img src="images/icons/color/view.png"/>
                                </a>

                                <a href="{{route('admin.comment.getDelete', $comment->id)}}" title="Xóa"
                                   class="tipS verify_action">
                                    <img src="images/icons/color/delete.png"/>
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