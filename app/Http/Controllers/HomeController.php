<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $products = Product::all();

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }


        return view('home.index', compact('products', 'count'));
    }

    public function login_home()
    {
        $products = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }


        return view('home.index', compact('products', 'count'));
    }

    public function details_product($id)
    {

        $data = Product::find($id);

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.products.details_product', compact('data', 'count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;

        $data->save();
        toastr()->timeOut(1000)->closeButton(true)->success('Product addeded successfylly');

        return redirect()->back();
    }


    public function mycart()
    {

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        }


        return view('home.mycart', compact('count', 'cart'));
    }

    public function remove_cart($id)
    {

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $cartItem = Cart::where('id', $id)->where('user_id', $userid);

            $cartItem->delete();
            return redirect()->back();
        }
    }


    public function order_confirm(Request $request){


        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();

        foreach($cart as $product){
            $order = new Order;

            $order->name = $name;
            $order->rec_address = $address;
            $order-> phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $product->product_id;
            $order->save();
        }

        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeOut(1000)->closeButton(true)->success('Product Ordered successfylly');

        return redirect()->back();

    }










}
