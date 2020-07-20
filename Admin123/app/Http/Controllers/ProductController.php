<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('product.index')->with(['products'=>$products]);
    }
    public function create() {
        //$image = $request->input('image');
       
        return view('product.create');
    }
    public function postCreate(ProductRequest $request) {
        // nhận tất cả tham số vào mảng product
        $product = $request->all();
        // xử lý upload hình vào thư mục
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
            {
                return redirect('product/create')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images",$imageName);
        }
        else
        {
            $imageName = null;
        }
        $p = new Product($product);
        $p->image = $imageName;
        $p->save();

        return redirect()->action('ProductController@index');
    }
    public function update($id) {
        $p = Product::find($id);
        return view('product.update', ['p'=>$p]);
    }
    public function postUpdate(ProductRequest $request, $id) {
        $name=$request->input('name');
        $price=$request->input('price');
        $des=$request->input('description');
        // xử lý upload hình vào thư mục
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
            {
               // return redirect('product/update/')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
                return Redirect::back()->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("public/images",$imageName);
        } else { // không upload hình mới => giữ lại hình cũ
            $p = Product::find($id);
            $imageName = $p->image;
        }
        $p = Product::find($id);
        $p->name=$name;
        $p->price=$price;
        $p->description=$des;
        $p->image = $imageName;
        $p->save();
        return redirect()->action('ProductController@index');
        
    }
    public function delete($id) {
        $p = Product::find($id);
        $p->delete();
        return redirect()->action('ProductController@index');
    }
}

