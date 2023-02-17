<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Notification;
use PDF;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class Admincontroller extends Controller
{
    public function view_catagory()
    {
        if (Auth::id()) {

            $data = catagory::all();

            return view('admin.catagory', compact('data'));
        } else {

            return redirect('login');
        }
    }
    public function add_catagory(Request $request)
    {
        $data = new catagory;
        $data->catagory_name = $request->catagory;
        $data->save();
        Alert::success('เพิ่มประเภทสินค้าแล้ว',);
        return redirect()->back();
    }

    public function delete_catagory($id)
    {
        $data = catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'ลบแล้ว');
    }

    public function view_product()
    {
        $catagory = catagory::all();
        return view('admin.product', compact('catagory'));
    }

    public function add_product(Request $requests)
    {
        $product = new product;
        $product->title = $requests->title;
        $product->description = $requests->description;
        $product->price = $requests->price;
        $product->quantity = $requests->quantity;
        $product->catagory = $requests->catagory;
        $image = $requests->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $requests->image->move('product', $imagename);
        $product->image = $imagename;
        $product->save();
        Alert::success('เพิ่มสินค้าแล้ว',);
        return redirect()->back();
    }

    public function show_product()
    {

        $product = product::all();

        return view('admin.show_product', compact('product'));
    }

    public function user()
    {
        $user = User::all();
        return view('admin.user', compact('user'));
    }

    public function delete_product($id)
    {
        $product = product::find($id);
        $product->delete();
        Alert::success('ลบสินค้าแล้ว',);
        return redirect()->back();
    }

    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::success('ลบข้อมูลแล้ว',);
        return redirect()->back();
    }

    public function update_product($id)
    {

        $product = product::find($id);
        $catagory = catagory::all();

        return view('admin.update_product', compact('catagory', 'product'));
    }

    public function update_user($id)
    {

        $user = user::find($id);
        return view('admin.update_user', compact('user'));
    }

    public function update_product_confirm(Request $requests, $id)
    {

        if (Auth::id()) {

            $product = product::find($id);
            $product->title = $requests->title;
            $product->description = $requests->description;
            $product->price = $requests->price;
            $product->quantity = $requests->quantity;

            $product->catagory = $requests->catagory;
            $image = $requests->image;

            if ($image) {

                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $requests->image->move('product', $imagename);
                $product->image = $imagename;
            }

            $product->save();
            Alert::success('แก้ไขข้อมูลสินค้าแล้ว',);
            return redirect()->back()->with('message', 'เพิ่มแล้ว');
        } else {

            return redirect('login');
        }
    }

    public function update_user_confirm(Request $requests, $id)
    {
        $user = User::find($id);
        $user->name = $requests->name;
        $user->email = $requests->email;
        $user->phone = $requests->phone;
        $user->address = $requests->address;

        $user->save();
        Alert::success('แก้ไขข้อมูลผู้ใช้แล้ว',);
        return redirect()->back();
    }

    public function order()
    {
        $order = order::all()->where('delivery_status','=', 'กำลังตรวจสอบ');
        return view('admin.order', compact('order'));
    }
    public function order_delivery(){
        $order = order::all()->where('delivery_status','=', 'จัดส่งแล้ว');

        return view('admin.order_delivery',compact('order'));
    }

    public function order_cancle()
    {
        $order = order::all()->where('delivery_status','=', 'ยกเลิกคำสั่งซื้อ');

        return view('admin.order_cancle', compact('order'));
    }


    public function delivered($id)
    {
        $order = order::find($id);
        $product = Product::all();
        $order->delivery_status = "จัดส่งแล้ว";
        $order->payment_status = "จ่ายแล้ว";
        // $product->quantity = $product->quantity - $order->quantity;
        $order->save();

        return redirect()->back();
    }
    public function print_pdf($id)
    {
        $order = order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return $pdf->stream('order_detail.pdf');
    }

    public function searchdata(Request $request)
    {
        $searchtext = $request->search;
        $order = Order::
        where('name', 'LIKE', "%$searchtext%")
        ->orWhere('phone', 'LIKE', "%$searchtext%")
        ->orWhere('product_title', 'LIKE', "%$searchtext%")
        ->orWhere('address', 'LIKE', "%$searchtext%")
        ->orWhere('email', 'LIKE', "%$searchtext%")
        ->orWhere('quantity', 'LIKE', "%$searchtext%")
        ->orWhere('price', 'LIKE', "%$searchtext%")
        ->get();
        return view('admin.order', compact('order'));
    }
    public function searchduser(Request $request)
    {
        $searchtext = $request->search;
        $user = User::
        where('name', 'LIKE', "%$searchtext%")
        ->orWhere('phone', 'LIKE', "%$searchtext%")
        ->orWhere('address', 'LIKE', "%$searchtext%")
        ->orWhere('email', 'LIKE', "%$searchtext%")
        ->get();
        return view('admin.user', compact('user'));
    }
}
