<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@getIndex');

//Trả về trang chủ
Route::get('index', [
    'as' => 'index',
    'uses' => 'PageController@getIndex'
]);

//Tìm kiếm sản phẩm
Route::get('search', ['as' => 'search', 'uses' => 'PageController@getSearch']);

//Lấy sản phẩm
Route::get('product/{type?}', [
    'as' => 'product',
    'uses' => 'PageController@getProduct'
]);

//Hiển thị sản phẩm giảm giá
Route::get('sale', [
    'as' => 'sale',
    'uses' => 'PageController@getSale'
]);


////Hiển thị chi tiết sản phẩm
//Route::get('detail/{id?}', [
//    'as'=>'detail',
//    'uses'=>'PageController@getProductDetail'
//]);

//Gửi mail cho người dùng
Route::get('lien-he', [
    'as' => 'getlienhe',
    'uses' => 'PageController@get_Lienhe'
]);

Route::post('lien-he', [
    'as' => 'postlienhe',
    'uses' => 'PageController@post_Lienhe'
]);

//Chỉnh sửa thông tin cá nhân
Route::get('profile/edit/{id?}', ['as' => 'getprofile', 'uses' => 'HomeController@getEditProfile']);
Route::post('profile/edit/{id?}', ['as' => 'postprofile', 'uses' => 'HomeController@postEditProfile']);

//Xóa sản phẩm
Route::post('delete/{product_id?}', ['as' => 'delete-image', 'uses' => 'ProductController@deleteImage']);

Auth::routes();

//Sửa đường dẫn trang chủ mặc định

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@home']);

Route::get('/homeadmin', ['as' => 'homeadmin', 'uses' => 'HomeController@homeadmin']);

// Đăng ký thành viên
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@getRegister']);
Route::post('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@postRegister']);

//Đăng nhập và xử lý đăng nhập
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);

//Đăng xuất
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);

//Thêm vào giỏ hàng
Route::get('add-cart/{id?}', [
    'as' => 'addcart',
    'uses' => 'CartController@getAddtoCart']);

//Thêm vào giỏ hàng detail-product
Route::get('add-cart-product-detail/{id?}/{q?}', [
    'as' => 'addcart-product-detail',
    'uses' => 'CartController@getAddtoCartDetail']);

//Xóa khỏi giỏ hàng
Route::get('del-cart/{id?}', [
    'as' => 'delcart',
    'uses' => 'CartController@getDelItemCart'
]);

//Hiển thị trang thanh toán
Route::get('checkout', [
    'as' => 'checkout',
    'uses' => 'PageController@getCheckout'
]);

//Thanh toán
Route::post('postcheckout', [
    'as' => 'postcheckout',
    'uses' => 'PageController@postCheckout'
]);


//Hiển thị chi tiết sản phẩm
Route::get('detail/{id?}', ['as' => 'detail', 'uses' => 'PageController@getDetail']);

Route::post('comment/{id?}', ['as' => 'comment', 'uses' => 'PageController@postComment']);

//Trang giới thiệu
Route::get('about-us', function () {
    return view('page.about-us');
})->name('about-us');

//----Route cho các trang của admin----

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('index', ['as' => 'admin.index', 'uses' => 'AdminController@getIndex']);
    Route::group(['prefix' => 'catalog'], function () {
        Route::get('/', ['as' => 'admin.catalog', 'uses' => 'AdminController@getCatalog']);
        Route::get('add', ['as' => 'admin.catalog.getAdd', 'uses' => 'AdminController@getAddCatalog']);
        Route::post('add', ['as' => 'admin.catalog.postAdd', 'uses' => 'AdminController@postAddCatalog']);
        Route::get('edit/{id?}', ['as' => 'admin.catalog.getEdit', 'uses' => 'AdminController@getEditCatalog']);
        Route::post('edit/{id?}', ['as' => 'admin.catalog.postEdit', 'uses' => 'AdminController@postEditCatalog']);
        Route::get('delete/{id?}', ['as' => 'admin.catalog.getDelete', 'uses' => 'AdminController@getDeleteCatalog']);
    });
    Route::group(['prefix' => 'slide'], function () {
        Route::get('/', ['as' => 'admin.slide', 'uses' => 'AdminController@getSlide']);
        Route::get('add', ['as' => 'admin.slide.getAdd', 'uses' => 'AdminController@getAddSlide']);
        Route::post('add', ['as' => 'admin.slide.postAdd', 'uses' => 'AdminController@postAddSlide']);
        Route::get('edit/{id?}', ['as' => 'admin.slide.getEdit', 'uses' => 'AdminController@getEditSlide']);
        Route::post('edit', ['as' => 'admin.slide.postEdit', 'uses' => 'AdminController@postEditSlide']);
        Route::get('delete/{id?}', ['as' => 'admin.slide.getDelete', 'uses' => 'AdminController@getDeleteSlide']);
    });
    Route::group(['prefix' => 'comment'], function (){
        Route::get('/', ['as' => 'admin.comment', 'uses' => 'AdminController@getComment']);
        Route::get('delete/{id?}', ['as' => 'admin.comment.getDelete', 'uses' => 'AdminController@getDeleteComment']);
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', ['as' => 'admin.product', 'uses' => 'AdminController@getProduct']);
        Route::get('add', ['as' => 'admin.product.getAdd', 'uses' => 'AdminController@getAddProduct']);
        Route::post('add', ['as' => 'admin.product.postAdd', 'uses' => 'AdminController@postAddProduct']);
        Route::get('edit', ['as' => 'admin.product.getEdit', 'uses' => 'AdminController@getEditProduct']);
        Route::post('edit', ['as' => 'admin.product.postEdit', 'uses' => 'AdminController@postEditProduct']);
        Route::get('delete/{id?}', ['as' => 'admin.product.getDelete', 'uses' => 'AdminController@getDeleteProduct']);
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', ['as' => 'admin.user', 'uses' => 'AdminController@getUser']);
        Route::get('add', ['as' => 'admin.user.getAdd', 'uses' => 'AdminController@getAddUser']);
        Route::post('add', ['as' => 'admin.user.postAdd', 'uses' => 'AdminController@postAddUser']);
        Route::get('edit/{id?}', ['as' => 'admin.user.getEdit', 'uses' => 'AdminController@getEditUser']);
        Route::post('edit/{id?}', ['as' => 'admin.user.postEdit', 'uses' => 'AdminController@postEditUser']);
        Route::get('delete/{id?}', ['as' => 'admin.user.getDelete', 'uses' => 'AdminController@getDeleteUser']);
    });
    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/', ['as' => 'admin.transaction', 'uses' => 'AdminController@getTransaction']);
        Route::get('order/{id?}', ['as' => 'admin.transaction.getOrder', 'uses' => 'AdminController@getOrderTransaction']);
        Route::get('delete/{id?}', ['as' => 'admin.transaction.getDelete', 'uses' => 'AdminController@getDeleteTransaction']);
        Route::group(['prefix' => 'order'], function () {
            Route::get('/', ['as' => 'admin.transaction.order', 'uses' => 'AdminController@getOrder']);
            Route::get('delete/{id?}', ['as' => 'admin.transaction.order.getDelete', 'uses' => 'AdminController@getDeleteOrder']);

        });
    });
});






