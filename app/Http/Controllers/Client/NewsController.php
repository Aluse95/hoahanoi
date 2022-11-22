<?php

namespace App\Http\Controllers\Client;

use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index() {

        $news = News::all();

        $new_product = Product::where('status', 1)
        ->inRandomOrder()
        ->take(8)->get();

        return view('client.news', compact('news','new_product'));
    }

    public function detail($news_alias = null) {

        $news = News::where('news_alias', $news_alias)->first();

        if($news) {

            $all_news = News::take(6)->get();
    
            $all_product = Product::inRandomOrder()
            ->take(8)->get();
    
            return view('client.news_detail', compact('news','all_product','all_news'));
        }

        return view('client.error');

    }

    public function intro() {

        $news = News::take(6)->inRandomOrder()->get();

        return view('client.intro', compact('news'));
    }

    public function contact() {

        return view('client.contact');
    }
    
}
