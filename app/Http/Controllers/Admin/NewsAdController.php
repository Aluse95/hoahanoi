<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsAdController extends Controller
{
    public function index() {

        $data = News::paginate(6);

        return view('admin.news.index', compact('data'));
    }

    public function getAdd() {

        return view('admin.news.add');
    }

    public function postAdd(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
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

        $data = News::all();

        $alias = str_replace(' ', '-', strtolower(convert_name($request->name)));

        $check = News::where('news_alias', $alias)->first();

        $i = 1;

        while($check != null ) {

            $alias .= '-'.++$i;

            $check = News::where('news_alias', $alias)->first();
        }

        $news = new News;
        $news->name = $request->name;
        $news->news_alias = $alias;
        $news->image = $request->image;
        $news->content = $request->content;
        $news->description = $request->description;
        $news->save();

        return redirect()->route('admin.news');
    }

    public function getEdit($id) {

        $item = News::find($id);

        return view('admin.news.edit', compact('item'));
    }

    public function postEdit(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'content' => 'required',
            'news_alias' => 'required',
            'description' => 'required'
        ], [
            'required' => 'Vui lòng nhập trường này!'
        ]);

        $news = News::find($id);
        $news->name = $request->name;
        $news->image = $request->image;
        $news->content = $request->content;
        $news->news_alias = $request->news_alias;
        $news->description = $request->description;
        $news->save();

        return redirect()->route('admin.news');
    }

    public function del($id) {

        $news = News::find($id);

        $news->delete();

        return redirect()->route('admin.news');
    }

    public function multiDel(Request $request) {

        $data = $request->all();

        foreach($data['news_id'] as $id) {

            $news = News::find($id);

            $news->delete();
        }

        return redirect()->route('admin.news');
    }
}
