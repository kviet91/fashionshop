<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Image;
use App\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|string|min:5',
            'discount' => 'required|string',
            'status' => 'required',
            'quantity' => 'required',
            'images' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'catalog_id' => $data['catalog'],
            'price' => $data['price'],
            'discount' => $data['discount'],
            'status' => $data['status'],
            'img_link' => 'img_product',
            'img_list' => 'img_list',
            'count' => $data['count'],
            'count_buy' => 0,
            'views' => 0,
            'rate' => 0,
        ]);
    }

    public function getAdd()
    {
        if (Auth::check())
        {
            if (Auth::user()->status == 1)
            {
                $catalog = Catalog::where('parent_catalog_id','<>', '0')->get();

                return view('admin.product1.add', compact('catalog'));
            }
            else
                {

                return redirect('/');
            }
        }
        else{

            return redirect('/');
        }


    }

    public function postAdd(Request $request)
    {

        // Kiểm tra dữ liệu vào
        $allRequest = $request->all();
       // $validator = $this->validator($allRequest);

       // if ($validator->fails()) {
            // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
        //    return view('echo')->withErrors($validator);
       // }
        //else {
            // Dữ liệu vào hợp lệ sẽ thực hiện tạo product dưới csdl
            $product = $this->create($allRequest);
            $img_list= ''; $img_link = '';
            if($request->hasFile('images'))
            {
                // Save Images path and upload to storage public/img
                foreach($request->file('images') as $image) {
                    $filenameWithExt = $image->getClientOriginalName();
                    $image->move('source/img', $filenameWithExt);

                    //copy image to admin/product/source/img/
                    $sourcePath = "source/img/".$filenameWithExt;
                    $destinationPath = "admin/product/source/img/".$filenameWithExt;
                    File::copy($sourcePath,$destinationPath);

                    //copy image to admin/product/admin/product/edit/source/img
                    $destinationPath = "admin/product/admin/product/edit/source/img/".$filenameWithExt;
                    File::copy($sourcePath,$destinationPath);

                    //$image->move('admin/product/source/img', $filenameWithExt);
                    //$image->move('admin/product/admin/product/edit/source/img', $filenameWithExt);
                    //$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    //$extension = $image->getClientOriginalExtension();
                    $img_list = $img_list.', '. $filenameWithExt;
                    Image::create([
                        'product_id' => $product->id,
                        'img_link' => $filenameWithExt,
                    ]);
                    $img_link= $filenameWithExt;
                    //$image = new Imageupload([
                    //  'content_id' => $product->id,
                    //'path' => $fileNameToStore,
                    //]);
                    // $image->save();
                }
                // Overide $product
                $product->img_link = $img_link;
                $product->img_list = $img_list;
                $product->save();
            }
            else
            {
                $fileNameToStore = 'noimage.png';
                // Overide $product
                $product->img_link= $fileNameToStore;
                $product->img_list = $fileNameToStore;
                $product->save();
            }
            Session::flash('success', 'Thêm sản phẩm thành công!');

            return redirect('/admin/product/add');

        }
    //}
    public function getView(){

        if(Auth::check())
        {
            if (Auth::user()->status == 1)
            {
                $product = Product::all()->get('1')->paginate(8);

                return view('admin.product.view', compact('product'));
            }
            else
            {

                return redirect('/');
            }
        }

        else
        {
            return redirect('/');
        }

    }

    public function getEdit($id=null){
        if($id == null)
        {
            return redirect()->back();
        }
        else
            {
                if(Auth::check())
                {
                    if (Auth::user()->status == 1)
                    {
                        $product = Product::find($id);
                        $anh= Image::where('product_id', $id)->get();
                        //dd($product);
                        $catalog = Catalog::find($product->catalog_id);
                        $ca = Catalog::where('id', '<>', $catalog->id);
                        $ca1 = $ca->where('parent_catalog_id', '<>', '0')->get();
                        return view('admin.product.edit', compact('product','anh', 'catalog', 'ca1'));
                    }
                    else
                    {

                        return redirect('/');
                    }
                }

                else
                {
                    return redirect('/');
                }
        }


    }
    public function postEdit(Request $request, $id){
        // Kiểm tra dữ liệu vào
        $allRequest = $request->all();
        $product = Product::find($id);
        // $validator = $this->validator($allRequest);

        // if ($validator->fails()) {
        // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
        //    return view('echo')->withErrors($validator);
        // }
        //else {
        // Dữ liệu vào hợp lệ sẽ thực hiện tạo product dưới csdl
        $img_list= ''; $img_link = '';
        if($request->hasFile('images'))
        {
            // Save Images path and upload to storage public/img
            foreach($request->file('images') as $image) {
                $filenameWithExt = $image->getClientOriginalName();
                $image->move('source/img', $filenameWithExt);

                //copy image to admin/product/source/img/
                $sourcePath = "source/img/".$filenameWithExt;
                $destinationPath = "admin/product/source/img/".$filenameWithExt;
                \File::copy($sourcePath,$destinationPath);

                //copy image to admin/product/admin/product/edit/source/img
                $destinationPath = "admin/product/admin/product/edit/source/img/".$filenameWithExt;
                \File::copy($sourcePath,$destinationPath);

                //$image->move('admin/product/source/img', $filenameWithExt);
                //$image->move('admin/product/admin/product/edit/source/img', $filenameWithExt);
                //$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //$extension = $image->getClientOriginalExtension();
                $img_list = $img_list.', '. $filenameWithExt;
                Image::create([
                    'product_id' => $product->id,
                    'img_link' => $filenameWithExt,
                ]);
                $img_link= $filenameWithExt;

                //$image = new Imageupload([
                //  'content_id' => $product->id,
                //'path' => $fileNameToStore,
                //]);
                // $image->save();
            }
            // Overide $product

            $product->img_link = $img_link;
            $product->img_list = $product->img_list.', '.$img_list;

        }

        //update $product
        $product->name = $allRequest['name'];
        $product->description = $allRequest['description'];
        $product->catalog_id = $allRequest['catalog'];
        $product->price = $allRequest['price'];
        $product->discount = $allRequest['discount'];
        $product->status = $allRequest['status'];
        $product->count = $allRequest['count'];
        $product->save();

        Session::flash('success', 'Sửa sản phẩm thành công!');

        return redirect()->route('admin.product.view');

    }

    public function delete($id)
    {
        $img= Product::find($id)->image;
        $comment = Product::find($id)->comment;
        $rate = Product::find($id)->rate;
        $order = Product::find($id)->order;

        if ($comment)
        {
            foreach ($comment as $co)
            {
                $co->delete();
            }

        }

        if ($rate)
        {
            foreach ($rate as $r)
            {
                $r->delete();
            }

        }

        if ($img)
        {
            foreach ($img as $i)
            {
                File::delete("source/img/".$i->img_link);
                File::delete("admin/product/source/img/".$i->img_link);
                File::delete("admin/product/admin/product/edit/source/img/".$i->img_link);
                $i->delete();
            }
        }

        if ($order)
        {
            foreach ($order as $o)
            {
                $o->delete();
            }

        }

        if ($pro = Product::find($id))
        {
            File::delete("source/img/".$pro->img_link);
            $pro->delete();

            Session::flash('success', 'Xoá sản phẩm thành công!');
            $product = Product::all()->get('1')->paginate(8);

            return redirect()->route('admin.product.view', compact('product'));
        }
        else
        {
            Session::flash('error', 'Xoá sản phẩm thất bại!');
            $product = Product::all()->get('1')->paginate(8);

            return redirect()->route('admin.product.view', compact('product'));
        }

    }

    public function deleteImage(Request $id, $product_id)
    {
        if(Auth::check())
        {
            if (Auth::user()->status == 1)
            {
                $pro = Product::find($product_id);
                $img = Image::find($id);
                $filename = $img->img_link;
                //xoa image
                $img->delete();
                File::delete("source/img/".$filename);
                File::delete("admin/product/source/img/". $filename);
                File::delete("admin/product/admin/product/edit/source/img/".$filename);

                if ($pro->img_link === $filename)
                {
                    //lay image moi
                    $img2 = Image::where('product_id', $product_id)->first();
                    $pro->img_link = $img2->img_link;
                    $pro->save();
                }

                return redirect()->route('admin.product.getedit', [$product_id]);
            }
            else
            {

                return redirect('/');
            }
        }

        else
        {
            return redirect('/');
        }
    }
}

