<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatController extends Controller
{
    public function index() {

        $data = Cat::paginate(6);

        return view('admin.cat.index', compact('data'));
    }

    public function getAdd() {

        return view('admin.cat.add');
    }

    public function postAdd(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
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

        $data = Cat::all();

        $alias = str_replace(' ', '-', strtolower(convert_name($request->name)));

        $check = Cat::where('cat_alias', $alias)->first();

        if($check) {

            return redirect()->back()->with('message','Vui lòng chọn tên danh mục khác!');
        }

        $cat = new Cat;
        $cat->name = $request->name;
        $cat->cat_alias = $alias;
        $cat->save();

        return redirect()->route('admin.cat');
    }

    public function getEdit($id) {

        $item = Cat::find($id);

        return view('admin.cat.edit', compact('item'));
    }

    public function postEdit(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required',
            'cat_alias' => 'required',
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $check = Cat::where('cat_alias', $request->cat_alias)->first();

        if($check) {

            return redirect()->back()->with('message','Vui lòng chọn tên danh mục khác!');
        }

        $cat = Cat::find($id);
        $cat->name = $request->name;
        $cat->cat_alias = $request->cat_alias;
        $cat->save();

        return redirect()->route('admin.product');
    }

    public function del($id) {

        $cat = Cat::find($id);

        $cat->delete();

        return redirect()->route('admin.cat');
    }

    public function multiDel(Request $request) {

        $data = $request->all();

        foreach($data['cat_id'] as $id) {

            $cat = Cat::find($id);

            $cat->delete();
        }

        return redirect()->route('admin.cat');
    }
}
