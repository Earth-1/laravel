<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;

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
    return redirect()->back()->with('message', 'เพิ่มแล้ว');
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

}

