<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $news_list = DB::table('news')->orderBy('id','desc')->take(3)->get();
        // dd($news_list);
        return view('front/index',compact('news_list'));
    }

    public function contact_us()
    {
        return view('front/contact_us');
    }

    public function news()
    {
        $news_list = DB::table('news')->paginate(6);
        // dd($news_list);
        return view('front/news',compact('news_list'));
    }

    public function news_info($news_id)
    {
        $news = DB::table('news')->where('id', '=', $news_id)->first();

        return view('front/news_info',compact('news'));
    }

}
