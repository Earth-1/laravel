<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;

class Admincontroller extends Controller
{
    public function view_catagory(){

        $data=catagory::all();

        return view ('admin.catagory',compact('data'));
}
public function add_catagory(Request $request){
    $data = new catagory;
    $data->catagory_name = $request->catagory;
    $data->save();
    return redirect()->back()->with('message', 'แก้ไขแล้ว');
}

public function delete_catagory($id){
    $data=catagory::find($id);
    $data->delete();
    return redirect()->back()->with('message', 'ลบแล้ว');
}

public function view_product(){
    $catagory = catagory::all();
    return view('admin.product',compact('catagory'));
}

public function add_product (Request $requests){
    $product = new product;
    $product->title = $requests-> title;
    $product->description = $requests-> description;
    $product->price = $requests-> price;
    $product->quantity = $requests-> quantity;
    $product->discount_price = $requests-> dis_price;
    $product->catagory = $requests-> catagory;
    $image = $requests-> image;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $requests->image->move('product',$imagename);
    $product->image = $imagename;
    $product->save();
    return redirect()->back()->with('message', 'เพิ่มแล้ว');
}

public function show_product(){

    $product=product::all();

    return view('admin.show_product',compact('product'));
}

public function delete_product($id){
    $product=product::find($id);
    $product->delete();
    return redirect()->back()->with('message', 'ลบสำเร็จแล้ว');

}
public function update_product($id){

    $product=product::find($id);
    $catagory=catagory::all();
    return view('admin.update_product',compact('catagory', 'product'));
}
public function update_product_confirm(Request $requests, $id){
    $product=product::find($id);
    $product->title = $requests-> title;
    $product->description = $requests-> description;
    $product->price = $requests-> price;
    $product->quantity = $requests-> quantity;
    $product->discount_price = $requests-> dis_price;
    $product->catagory = $requests-> catagory;
    $image = $requests-> image;

    if($image) {

    $imagename=time().'.'.$image->getClientOriginalExtension();
    $requests->image->move('product',$imagename);
    $product->image = $imagename;
}

    $product->save();
    return redirect()->back()->with('message', 'เพิ่มแล้ว');


}
public function order(){
        $order = order::all();
        return view('admin.order',compact('order'));
}

}
