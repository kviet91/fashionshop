<table width="100%" border="0">
    <tr>
        <td width="50%"><p class="userinfo hovaten"><img src="source/img/user.png"
                                                         style="width: 40px; height: 40px; ">{{  __(' Tài khoản') }}</p>
        </td>
        <td width="50%"><p class="userinfo email"><img src="source/img/email.png"
                                                       style="width: 40px; height: 40px;">{{  __(' Địa chỉ email') }}</p>
        </td>
    </tr>
    <tr>
        <td><p class="info">{{ Auth::user()->fullname }}</p></td>
        <td><p class="info">{{ Auth::user()->email }}</p></td>
    </tr>
    <tr>
        <td><p class="userinfo dienthoai"><img src="source/img/phone.png"
                                               style="width: 40px; height: 40px;">{{  __('Số điện thoại') }}</p></td>
        <td><p class="userinfo diachi"><img src="source/img/address.png"
                                            style="width: 40px; height: 40px;">{{  __('Địa chỉ') }}</p></td>
    </tr>
    <tr>
        <td><p class="info">{{ Auth::user()->phone }}</p></td>
        <td><p class="info">{{ Auth::user()->address }}</p></td>
    </tr>
</table>

<p class="profile-submit"><a href="{{ route('getprofile', [Auth::user()->id]) }}">{{  __('Chỉnh sửa') }}</a></p>