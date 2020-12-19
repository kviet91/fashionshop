<?php

namespace App\Http\Controllers;

use App\Catalog;
use Mail;
use App\Comment;
use App\Image;
use App\Slide;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;
use App\Transaction;
use App\Order;
use App\Rate;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\CommentRequest;


class PageController extends Controller
{
    //Hiển thị trang chủ
    public function getIndex()
    {
        $slide = Slide::all();
        $sale = Product::where('discount', '<>', 0.0)->get();
        $new = Product::where('status', 1)->orderBy('id', 'desc')->get();
        $pick = Product::where('status', 1)->take(4)->get();
        return view('page.home', compact('slide', 'sale', 'new', 'pick')); //truyền slide sang view home
    }

    //Gửi email
    public function post_Lienhe(Request $req)
    {
        $req->validate([
            'name' => 'required'
        ]);
        $data = ['name' => $req->name];

        Mail::send('blank', $data, function ($msg) use ($data) {
            $msg->from('ducbao.phan@gmail.com', 'Bao Phan');
            $msg->to($data['name'], '')->subject('Cảm ơn bạn đã đăng kí nhân thông tin từ cửa hàng!');
        });
        return redirect()->back();
    }


    public function getListUser()
    {
        if (Auth::check()) {
            if (Auth::user()->status == 1) {
                $list_user = User::all()->get('1')->paginate(8);

                return view('admin.view-user', compact('list_user'));
            } else {

                return redirect('/');
            }
        } else {
            return redirect('/');
        }

    }

    //DeleteUser
    public function DeleteUser($id)
    {

        $user = User::find($id);
        $comment = User::find($id)->comment;
        $rate = User::find($id)->rate;

        $transaction = User::find($id)->transaction;
        $order = User::find($id)->order;

        if ($comment) {
            foreach ($comment as $co) {
                $co->delete();
            }

        }

        if ($rate) {
            foreach ($rate as $r) {
                $r->delete();
            }

        }

        if ($order) {
            foreach ($order as $o) {
                $o->delete();
            }
        }

        if ($transaction) {
            foreach ($transaction as $tr) {
                $tr->delete();
            }
        }

        if ($user) {
            $user->delete();
            Session::flash('success', 'Xoá User thành công!');

            return redirect()->route('list-user');
        } else {
            Session::flash('error', 'Xoá User thất bại!');

            return redirect()->route('list-user');
        }


    }

    //Lấy chi tiết sản phẩm
    public function getDetail($id)
    {

        $detail = Product::find($id);
        $img = Image::where('product_id', $detail->id)->get();
        $cm = Comment::where('product_id', $detail->id)->get();
        $rate = Rate::where('product_id', $detail->id)->get();
        return view('page.product-detail', compact('img', 'detail', 'cm', 'rate'));
    }

    //Rate and Comment
    public function postComment(CommentRequest $request)
    {
        if (Auth::check()) {
            $comment = new Comment();
            $comment->product_id = $request->product_id;
            $comment->user_id = Auth::user()->id;
            $comment->content = $request->review;
            $comment->rate = $request->rating;
            $comment->save();

            $rate = new Rate();
            $rate->user_id = Auth::user()->id;
            $rate->product_id = $request->product_id;
            $rate->rate = $request->rating;
            $rate->save();
            return redirect()->back()->with(['success' => 'Gửi đánh giá thành công']);
        } else {
            return redirect()->route('login')->with(['error' => 'Bạn phải đăng nhập trước khi đánh giá!']);
        }

    }

    // Tìm kiếm sản phẩm
    public function getSearch(Request $request)
    {
        $product_key = $request->key;
        $product = Product::where('name', 'like', '%' . $product_key . '%')->paginate(8);
        return view('page.search', compact('product', 'product_key'));
    }

    //hiện thị trang sản phẩm theo danh mục
    public function getProduct($type)
    {
        $product = Product::where('catalog_id', $type)->paginate(8);
        $ca = Catalog::find($type);
        return view('page.products', compact('product', 'type', 'ca'));
    }

    //Hiển thị sản phẩm giảm giá
    public function getSale()
    {
        $sale = Product::where('discount', '<>', 0)->paginate(8);
        return view('page.sale', compact('sale'));
    }

    //Hiển thị trang chi tiết sản phẩm
    public function getProductDetail(Request $request)
    {
        $sanpham = Product::where('id', $request->id)->first();
        return view('page.product-detail', compact('sanpham'));
    }

    //Hiển thị trang thanh toán
    public function getCheckout()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $item = $cart->items;
        return view('page.checkout', compact('cart', 'item'));
    }

    //Thanh toán đơn hàng
    public function postCheckout(Request $request)
    {
        $cart = Session::get('cart');

        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->status = 0;
        $transaction->fullname = $request->name;
        $transaction->email = $request->email;
        $transaction->address = $request->address;
        $transaction->phone = $request->phone;
        $transaction->msg = $request->msg;
        $transaction->amount = $cart->totalPrice; //tổng tiền
        $transaction->payment = $request->payments;
        $transaction->delivery_fee = $request->shipping;
        $transaction->total = $cart->totalPrice + $request->shipping;
        $transaction->save();

        foreach ($cart->items as $key => $value) {
            $order = new Order();
            $order->transaction_id = $transaction->id;
            $order->product_id = $key;
            $order->count = $value['qty'];
            $order->amount = $value['price'];
            $order->status = 0;
            $order->save();
        }
        Session::forget('cart');
        Session::flash('success', 'Đặt hàng thành công!!!');

        return view('page.checkout-success');

    }

    public function getDetailTransaction($id)
    {

    }

    //Comment and rate

}
