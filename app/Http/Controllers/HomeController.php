<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;


class HomeController extends Controller
{
    public function index()
    {

        $users = User::where('usertype', 'user')->get()->count();
        $products = Product::all()->count();
        $orders = Order::all()->count();
        $delevereds = Order::where('status', 'success')->get()->count();



        return view('admin.index', compact('users', 'products', 'orders', 'delevereds'));
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

    // Cart

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

    // Order

    public function order_confirm(Request $request)
    {


        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $product) {
            $order = new Order;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $product->product_id;
            $order->save();
        }

        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeOut(1000)->closeButton(true)->success('Product Ordered successfylly');

        return redirect()->back();
    }

    public function my_order()
    {

        $user = Auth::user()->id;
        $count = Cart::where('user_id', $user)->get()->count();
        $orders = Order::where('user_id', $user)->get();

        return view('home.order.my_order', compact('count', 'orders'));
    }



    // stripe

    public function stripe($value)
    {
        return view('home.stripe', compact('value'));
    }


    public function stripePost(Request $request, $value)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create([

            "amount" => $value * 100,

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Test payment from itsolutionstuff.com."

        ]);


        $name = Auth::user()->name;
        $address = Auth::user()->address;
        $phone = Auth::user()->phone;
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $product) {
            $order = new Order;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $product->product_id;
            $order->payment_status = "paid";
            $order->save();
        }

        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeOut(1000)->closeButton(true)->success('Product Ordered successfylly');

        return redirect('mycart');
    }


    // shop
    public function shop(){
        $products = Product::all();

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }


        return view('shop.shop', compact('products', 'count'));
    }

    public function testimonial(){

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }else{
            $count = '';
        }

        return view('testimonial.testimonial',compact('count'));
    }
    public function why_us(){

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('why-us.why_us', compact('count'));
    }

    public function contact_us(){

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('contact.contact_us', compact('count'));
    }
}
