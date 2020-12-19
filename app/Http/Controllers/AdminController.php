<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Comment;
use App\Image;
use App\Product;
use App\Slide;
use App\Transaction;
use App\Order;
use App\Http\Requests\CatalogRequest;
use App\Http\Requests\EditCatalogRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SlideRequest;
use App\Http\Requests\EditSlideRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    //Homepage
    public function getIndex()
    {
        $transaction = Transaction::all();
        $product = Product::all();
        $user = User::all();
        return view('admin.index', compact('transaction', 'user', 'product'));
    }

    //Catalog
    public function getCatalog()
    {
        $catalog = Catalog::where('parent_catalog_id', '<>', 0)->get();
        return view('admin.catalog.index', compact('catalog'));
    }

    //Add Catalog
    public function getAddCatalog()
    {

        return view('admin.catalog.add');
    }

    public function postAddCatalog(CatalogRequest $request)
    {
        $catalog = new Catalog();
        $catalog->name = $request->name;
        $catalog->parent_catalog_id = $request->parent_id;
        $catalog->description = $request->meta_desc;
        $catalog->save();
        return redirect()->route('admin1.catalog')->with(['success' => 'Thêm danh mục thành công!']);
    }

    //Edit Catalog
    public function getEditCatalog($id)
    {
        $catalog = Catalog::find($id);
        return view('admin.catalog.edit', compact('catalog', 'id'));
    }

    public function postEditCatalog(EditCatalogRequest $request, $id)
    {
        $catalog = Catalog::find($id);
        $catalog->name = $request->name;
        $catalog->parent_catalog_id = $request->parent_id;
        $catalog->description = $request->meta_desc;
        $catalog->save();
        return redirect()->route('admin1.catalog')->with(['success' => 'Cập nhật danh mục thành công!']);
    }

    public function getDeleteCatalog($id)
    {
        $catalog = Catalog::find($id);
        $product = Catalog::find($id)->product;
        if (isset($product)) {
            foreach ($product as $product) {
                $product->delete();
            }
        }

        if (isset($product)) {
            $catalog->delete();
        }
        return redirect()->back()->with(['success' => 'Xóa danh mục thành công!']);
    }


    //Slide
    public function getSlide()
    {
        $slide = Slide::all();
        return view('admin.slide.index', compact('slide'));
    }

    //Add Slide
    public function getAddSlide()
    {
        $slide = Slide::all();
        return view('admin.slide.add', compact('slide'));
    }

    public function postAddSlide(SlideRequest $request)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $slide = new Slide();
        $slide->name = $request->name;
        $slide->img_link = $file_name;
        $request->file('image')->move('source/img/slide', $file_name);
        $slide->title = $request->title;
        $slide->description = $request->desc;
        $slide->save();
        return redirect()->route('admin1.slide')->with(['success' => 'Thêm slide thành công!']);
    }

    //Edit Slide
    public function getEditSlide($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.edit', compact('slide'));
    }

    public function postEditSlide(EditSlideRequest $request, $id)
    {
        $slide = Slide::find($id);
        $slide->name = $request->name;
        $slide->img_link = $request->link;
        $slide->title = $request->title;
        $slide->description = $request->desc;
        $slide->save();
        return redirect()->route('admin1.slide')->with(['success' => 'Chỉnh sửa slide thành công!']);

    }

    public function getDeleteSlide($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->back()->with(['success' => 'Xóa slide thành công!']);
    }

    //Comment
    public function getComment()
    {
        $comment = Comment::select(['*'])->with('user','product')->get();
        return view('admin.comment.index', compact('comment', 'product'));
    }

    public function getDeleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with(['success' => 'Xóa bình luận thành công!']);
    }

    //Product
    public function getProduct()
    {
        $catalog = Catalog::where('parent_catalog_id', '<>', 0)->get();
        $product = Product::all();
        return view('admin.product.index', compact('product', 'catalog'));
    }

    public function getAddProduct()
    {
        $catalog = Catalog::all();
        return view('admin.product.add', compact('catalog'));
    }

    public function postAddProduct(ProductRequest $request)
    {
        //Image
        $file_name = $request->file('image')->getClientOriginalName();
        $product = new Product();
        $product->name = $request->name;
        $product->catalog_id = $request->cat;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->description = $request->name;
        $product->img_link = $file_name;
        $request->file('image')->move('source/img', $file_name);
        $product->count = $request->count;
        $product->save();
        $product_id = $product->id;

        //Detail Image
        if ($request->hasFile('image_list')) {
            foreach ($request->file('image_list') as $file) {
                $image = new Image();
                $image->id = $product_id;
                $image->img_link = $file->getClientOriginalName();
                $file->move('source/img', $file->getClientOriginalName());
                $image->save();
            }
        }

        return redirect()->back()->with(['success' => 'Thêm sản phẩm thành công!']);
    }

    public function getEditProduct()
    {
        return view('admin.product.edit');
    }

    public function postEditProduct()
    {

    }

    public function getDeleteProduct($id)
    {
        $image = Product::find($id)->image;
        $comment = Product::find($id)->comment;
        $rate = Product::find($id)->rate;
        $order = Product::find($id)->order;

        if ($comment) {
            foreach ($comment as $comment) {
                $comment->delete();
            }

        }

        if ($rate) {
            foreach ($rate as $rate) {
                $rate->delete();
            }

        }

        if ($image) {
            foreach ($image as $image) {
                File::delete("source/img/" . $image->img_link);
                File::delete("admin/product/source/img/" . $image->img_link);
                File::delete("admin/product/admin/product/edit/source/img/" . $image->img_link);
                $image->delete();
            }
        }

        if ($order) {
            foreach ($order as $oder) {
                $oder->delete();
            }

        }

        if ($product = Product::find($id)) {
            File::delete("source/img/" . $product->img_link);
            $product->delete();

//            Session::flash('success', 'Xoá sản phẩm thành công!');
            $product = Product::all()->get('1')->paginate(8);

            return redirect()->route('admin.product.view', compact('product'));
        } else {
//            Session::flash('error', 'Xoá sản phẩm thất bại!');
            $product = Product::all()->get('1')->paginate(8);

            return redirect()->route('admin.product.view', compact('product'));
        }
    }

    //Member
    public function getUser()
    {
        $user = User:: all();
        return view('admin.user.index', compact('user'));
    }

    public function getAddUser()
    {
        return view('admin.user.add');
    }

    public function postAddUser(UserRequest $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->fullname = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->remember_token = $request->_token;
        $user->save();
        return redirect()->route('admin.user')->with(['success' => 'Thêm thành viên thành công!']);
    }

    public function getEditUser($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user', 'id'));
    }

    public function postEditUser(EditUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->username;
        $user->fullname = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->update();
        Session::flash('success', 'Chỉnh sửa thông tin thành công!');
        return redirect()->route('admin.user');
    }

    public function getDeleteUser($id)

    {
        if (Auth::user()->status == 1) {
            $user = User::find($id);
            $comment = User::find($id)->comment;
            $rate = User::find($id)->rate;

            $transaction = User::find($id)->transaction;
            $order = User::find($id)->order;

            if ($comment) {
                foreach ($comment as $comment) {
                    $comment->delete();
                }

            }

            if ($rate) {
                foreach ($rate as $rate) {
                    $rate->delete();
                }

            }

            if ($order) {
                foreach ($order as $oder) {
                    $oder->delete();
                }
            }

            if ($transaction) {
                foreach ($transaction as $transaction) {
                    $transaction->delete();
                }
            }

            if ($user) {
                $user->delete();

                return redirect()->route('admin.user')->with(['success' => 'Xoá User thành công!']);
            } else {
                return redirect()->route('admin.user')->with(['success' => 'Xoá User thất bại!']);

            }

        } else {
            return redirect()->route('admin.user')->with(['error' => 'Bạn không có quyền thực hiện thao tác này!']);

        }

    }

    //Quản lý mua hàng
    public function getTransaction()
    {
        $transaction = Transaction::all();
        return view('admin.transaction.index', compact('transaction'));
    }

    public function getDeleteTransaction($id)
    {
        $transaction = Transaction::find($id);
        $order = Transaction::find($id)->order;
        if (isset($order)) {
            foreach ($order as $order) {
                $order->delete();
            }
        }
        if (isset($transaction)) {
            $transaction->delete();
        }
        return redirect()->route('admin.transaction')->with(['success' => 'Xoá đơn hàng thành công!']);

    }

    public function getOrderTransaction($id)
    {
        $transaction = Transaction::find($id);
        $order = $transaction->products;
        return view('admin.transaction.order', compact('order', 'transaction'));
    }

    public function getDeleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with(['success' => 'Xoá sản phẩm khỏi đơn hàng thành công!']);

    }


}
