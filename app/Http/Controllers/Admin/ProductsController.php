<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cat;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index() {

        $data = Product::paginate(6);

        return view('admin.product.index', compact('data'));
    }

    public function getAdd() {

        $data = Cat::all();

        return view('admin.product.add', compact('data'));
    }

    public function postAdd(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'cat_id' => 'required',
            'price' => 'required',
            'content' => 'required',
            'image' => 'required',
            'description' => 'required'
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        function convert_name($str) {
            $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
            $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
            $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
            $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
            $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
            $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
            $str = preg_replace("/(đ)/", 'd', $str);
            $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
            $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
            $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
            $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
            $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
            $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
            $str = preg_replace("/(Đ)/", 'D', $str);
            $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
            $str = preg_replace("/( )/", '-', $str);
            return $str;
        }

        $data = Product::all();
        $alias = str_replace(' ', '-', strtolower(convert_name($request->name)));
        $check = Product::where('product_alias', $alias)->first();
        $i = 1;

        while($check != null ) {

            $alias .= '-'.++$i;
            
            $check = Product::where('product_alias', $alias)->first();
        }

        $product = new Product;
        $product->name = $request->name;
        $product->product_alias = $alias;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->cat_id = $request->cat_id;
        $product->content = $request->content;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('admin.product');
    }

    public function getEdit($id) {

        $item = Product::find($id);

        return view('admin.product.edit', compact('item'));
    }

    public function postEdit(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required',
            'product_alias' => 'required',
            'price' => 'required',
            'old_price' => 'required',
            'content' => 'required',
            'image' => 'required',
            'description' => 'required'
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->content = $request->content;
        $product->old_price = $request->old_price;
        $product->description = $request->description;
        $product->product_alias = $request->product_alias;

        $product->save();

        return redirect()->route('admin.product');
    }

    public function del($id) {

        $product = Product::find($id);

        $product->delete();

        return redirect()->route('admin.product');
    }

    public function multiDel(Request $request) {

        $data = $request->all();

        foreach($data['product_id'] as $id) {

            $product = Product::find($id);

            $product->delete();
        }

        return redirect()->route('admin.product');
    }
}
