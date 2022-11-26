<?php

namespace App\Http\Controllers\Client;
use App\Models\Cat;
use App\Models\News;
use App\Models\Product;
use App\Models\Comment;
use App\Models\ReplyComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function home() {

        $all_cats = Cat::whereNot('id',3)->orderBy('id','asc')->take(4)->get();

        $total = [];

        foreach($all_cats as $cat) {

            $total[$cat->name] = Product::where('cat_id',$cat->id)->take(8)->get();
        }

        $data = new Product;

        $hoa_tuan_nay = $data->getByCatIdExcept(3,4);

        $hoa_chia_buon = $data->getByCatId(3,8);

        $news = News::take(4)->get();

        return view('client.home', compact('all_cats','total','hoa_tuan_nay','hoa_chia_buon','news'));
    }

    public function product($alias = null) {

        $product = Product::where('product_alias', $alias)->first();

        if($product) {

            $all_cat = Cat::all();
    
            $cat = $product->cat;
    
            $desc = Product::whereNot('cat_id', 3)
            ->inRandomOrder()->take(5)->get();
    
            $product_like = Product::where('cat_id', $cat->id)
            ->whereNot('product_alias', $alias)
            ->take(6)->get();
    
            $news = News::take(4)->get();
    
            return view('client.product', compact('cat','product','desc','product_like','news','all_cat'));
        }

        return view('client.error');
    }

    public function category($alias = null) {

        $all_cat = Cat::all();

        $cat = Cat::where('cat_alias', $alias)->first();

        if($cat) {
            
            $all_product = $cat->product;

            session()->flash('active', $alias);
    
            return view('client.cat', compact('cat','all_product','all_cat'));
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
