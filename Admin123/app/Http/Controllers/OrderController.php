<?php

namespace App\Http\Controllers;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Order;
class OrderController extends Controller
{
    public function index() {
        $orders=Order::all();
        return view('order.index')->with(['orders'=>$orders]);
    }
    public function create() {
        //$image = $request->input('image');
       
        return view('order.create');
    }
    public function postCreate(OrderRequest $request) {
        // nhận tất cả tham số vào mảng product
        $order = $request->all();
        // xử lý upload hình vào thư mục
       
        $p = new Order($order);
       
        $p->save();
          return redirect()->action('OrderController@index')->with(['flash_message'=>'Add product completed']);
    }
    
}
