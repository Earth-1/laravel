<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;
use finfo;
use Illuminate\Contracts\Session\Session as SessionSession;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(9);
        $count_cart = Cart::all()->count();
        $cart = Cart::all();
        return view('home.userpage', compact('product', 'count_cart', 'cart'));
    }
    public function  redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $total_product = product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();
            $order = Order::all();
            $total_revenue = 0;
            $cart = Cart::all();
            foreach ($order as $order) {
                // $total_revenue = $total_revenue +  $order->price;
            }
            $total_delivered = Order::where('delivery_status', '=', 'จัดส่งแล้ว')->get()->count();
            $total_processing = Order::where('delivery_status', '=', 'กำลังตรวจสอบ')->get()->count();
            $total_cancle = Order::where('delivery_status', '=', 'ยกเลิกคำสั่งซื้อ')->get()->count();
            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_delivered', 'total_processing','total_cancle', 'cart'));
        } else {
            $product = Product::paginate(10);
            return view('home.userpage', compact('product'));
        }
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $product = product::find($id);
            $product_exist_id = Cart::where('product_id', '=', $id)->where('user_id', '=', $userid)->get('id')->first();
            if ($product_exist_id) {
                $cart = Cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;
                $cart->price = $product->price * $cart->quantity;
                $cart->size = $request->size;
                $cart->save();
                Alert::success('เพิ่มสินค้าแล้ว',);
                return redirect()->back();
            } else {
                $cart = new Cart();
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
                $cart->product_title = $product->title;
                $cart->price = $product->price * $request->quantity;
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->quantity = $request->quantity;
                $cart->size = $request->size;
                $cart->save();
                Alert::success('เพิ่มสินค้าแล้ว',);
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $count_cart = Cart::all()->count();
            $cart = cart::where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart', 'count_cart'));
        } else {
            return redirect('login');
        }
    }
    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function shirt($id)
    {
        $product = Product::where('catagory', '=', $id)->paginate(9);
        $count_cart = Cart::all()->count();
        return view('home.shirt', compact('product', 'count_cart'));
    }
    public function show_order()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $order = Order::where('user_id', '=', $userid)->get();
            return view('home.order', compact('order'));
        } else {
            return redirect('login');
        }
    }
    public function cancel_order($id)
    {
        $order = order::find($id);
        $order->delivery_status = 'ยกเลิกคำสั่งซื้อ';
        $order->save();
        return redirect()->back();
    }
    public function shop()
    {
        return view('home.shop');
    }
    public function paid()
    {

        return view('home.paid');
    }
    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = cart::Where('user_id', '=', $userid)->get();
        foreach ($data as $data) {
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'จ่ายปลายทาง';
            $order->delivery_status = 'กำลังตรวจสอบ';
            $order->size = $data->size;
            $order->order_img_pay = "";
            $order->save();
            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        Alert::success('ซื้อสำเร็จ');
        return redirect()->back();
    }
    public function pay_order(Request $request)
    {

        $user = Auth::user();
        $userid = $user->id;
        $data = cart::Where('user_id', '=', $userid)->get();

        foreach ($data as $data) {
            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->size = $data->size;

            $order->order_img_pay = $request->order_img_pay;

            $order->payment_status = 'จ่ายแล้ว';
            $order->delivery_status = 'กำลังตรวจสอบ';
            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back();
    }
}
