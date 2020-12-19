<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //Thêm vào giỏ hàng
    public function getAddtoCart(Request $request, $id){
        if (Auth::check())
        {
            $product = Product::find($id);
            $oldCart = Session('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->add($product, $id);
            $request->session()->put('cart', $cart);
            return redirect()->back();
        }
        else
        {
            Session::flash('error', 'Bạn phải đăng nhập trước rồi mua hàng! Hoặc bạn cần đăng ký một tài khoản!');

            return redirect()->route('login');
        }
    }

    //Thêm vào giỏ hàng detail-product
    public function getAddtoCartDetail(Request $request, $id)
    {
        if (Auth::check())
        {
            $allRequest = $request->all();
            $product = Product::find($id);
            $oldCart = Session('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->addDetail($product, $id, $allRequest['q']);
            $request->session()->put('cart', $cart);
            return redirect()->back();
        }
        else
        {
            Session::flash('error', 'Bạn phải đăng nhập trước rồi mua hàng! Hoặc bạn cần đăng ký một tài khoản!');

            return redirect()->route('login');
        }
    }

    //Xóa sản phẩm khỏi giỏ hàng
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return redirect()->back();
    }
}
