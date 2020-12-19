<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:255',
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        if (Auth::user()->status == 0) {

            return view('user.home');
        } elseif (Auth::user()->status == 1) {
            return view('user.home');
        }

    }

    public function getEditProfile($id)
    {
        if (Auth::check()) {

            return view('user.edit_profile', compact('id'));
        } else {
            $sale = Product::where('discount', 0.2)->get();
            $new_product = Product::where('status', 1)->get();
            return view('welcome', compact('sale', 'new_product'));
        }
    }

    public function postEditProfile(Request $re, $id)
    {
        if (Auth::check()) {
            $allRequest = $re->all();
            $validator = $this->validator($allRequest);

            if ($validator->fails() || ($allRequest['password'] <> $allRequest['password_confirmation'])) {
                // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
                return redirect()->route('getprofile', [Auth::user()->id])->withErrors($validator);
            } else {
                $user = User::find($id);
                $user->fullname = $allRequest['username'];
                $user->email = $allRequest['email'];
                $user->address = $allRequest['address'];
                $user->phone = $allRequest['phone'];
                if ($allRequest['password'] != null) {
                    $user->password = Hash::make($allRequest['password']);
                }
                $user->save();

                if (Auth::user()->status) {
                    Session::flash('success', 'Chỉnh sửa thông tin thành công!');

                    return redirect()->route('home');
                } elseif (Auth::user()->status == 0) {
                    Session::flash('success', 'Chỉnh sửa thông tin thành công!');

                    return redirect()->route('home');
                }
            }

        } else {
            return redirect('home');
        }
    }
}
