<?php

namespace App\Http\Controllers;
use App\Models\Cat;
use App\Models\News;
use App\Models\Product;
use App\Models\Comment;
use App\Models\ReplyComment;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home() {

        $data = new Product();

        $hoa_tuan_nay = $data->getByCatIdExcept(3,4);

        $bo_hoa_dep = $data->getByCatId(1,8);

        $gio_hoa_dep = $data->getByCatId(2,8);

        $hoa_sap = $data->getByCatId(4,8);

        $hoa_chia_buon = $data->getByCatId(3,8);

        $hoa_khai_truong = $data->getByCatId(5,8);

        $news = News::take(4)->get();

        return view('client.home', compact('hoa_tuan_nay','bo_hoa_dep','gio_hoa_dep','hoa_sap','hoa_chia_buon','hoa_khai_truong','news'));
        
    }

    public function news() {

        $news = News::all();

        $new_product = Product::where('status_product', 1)
        ->inRandomOrder()
        ->take(8)->get();

        return view('client.news', compact('news','new_product'));
    }



    public function category($cat_alias = null) {

        $all_cat = Cat::all();

        $cat = Cat::where('cat_alias', $cat_alias)->first();

        $news = News::where('news_alias', $cat_alias)->first();

        $product = Product::where('product_alias', $cat_alias)->first();

        if($cat) {

            $all_product = $cat->product;

            return view('client.cat', compact('cat','all_cat', 'all_product'));

        } else if($product) {

            $cat = $product->cat;

            $desc = Product::whereNot('cat_id', 3)->inRandomOrder()->take(5)->get();

            $product_like = Product::where('cat_id', $cat->id)
            ->whereNot('product_alias', $cat_alias)
            ->take(6)->get();

            $news = News::take(4)->get();

            return view('client.product', compact('cat','product','desc','product_like','news','all_cat'));

        } else if($news) {

            $all_news = News::take(6)->get();
    
            $all_product = Product::inRandomOrder()
            ->take(8)->get();

            $all_cmt = Comment::all();
            $all_rep = ReplyComment::all();
    
            return view('client.news_detail', compact('news','all_product','all_news','all_cmt','all_rep'));
        }
 
        return view('client.error');
    }

    public function search(Request $request) {

        $name = $request->input('name');

        $data = Product::where('name', 'like', '%'.$name.'%' )->get();

        if($data->count() > 0) {

            return $data;

        } else {

            return;
        }

    }
    

}
