<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $newProducts = Product::where('new', 1)->simplePaginate(4);
        $productSale = Product::where('promotion_price', '<>', '0')->simplePaginate(8);
        return view('page.home', compact('slide', 'newProducts', 'productSale'));
    }

    public function getProductType($idType)
    {
        $productByTypes = Product::where('id_type', $idType)->paginate(6);
        $typeProduct = ProductType::find($idType);
        $productDifTypes = Product::where('id_type','<>', $idType)->paginate(3);
        $types = ProductType::all();
        return view('page.ProductType', compact('productByTypes', 'productDifTypes', 'types', 'typeProduct'));
    }

    public function getDetailProduct(Request $request)
    {
        $product = Product::find($request->id);
        $productRelat = Product::where('id_type', $product->id_type)->where('id','<>', $product->id)->simplePaginate(3);
        return view('page.detailProduct', compact('product', 'productRelat'));
    }
    public function Contact()
    {
        return view('page.contact');
    }

    public function Cart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function delCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        return view('page.login');
    }

    public function getSignup()
    {
        return view('page.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'fullname' => 'required',
                're_password' => 'required|same:password',
            ],
            [
                'email.required' => "Vui long nhap email",
                'email.email' => "Khong dung dinh dang email",
                'email.unique' => "Email da ton tai",
                'password.required' => "Vui long nhap mat khau",
                'password.min' => "Mk tối thiểu 6 kí tự",
                'password.max' => "Mk tối da 20 kí tự",
                'fullname.required' => "Vui long nhap ten",
                're_password.required' => "Vui long nhap lai mat khau",
                're_password.same' => "Khong trung mat khau",
            ]);
        $user = new User();
        $user->full_name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('thongbao', 'Tao tai khoan thanh cong');
    }
}
