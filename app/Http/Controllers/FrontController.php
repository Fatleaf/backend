<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        // $user = DB::table('user')->get();
        $news_list = DB::table('news')->orderBy('id','desc')->take(3)->get();
        // dd($news_list);
        return view('front.index',compact('news_list'));
    }

    public function contact_us()
    {
        return view('front.contact_us');
    }

    public function news()
    {
        $news_list = DB::table('news')->paginate(6);
        // dd($news_list);
        return view('front.news',compact('news_list'));
    }

    public function news_info($news_id)
    {
        $news = DB::table('news')->where('id', '=', $news_id)->first();

        return view('front.news_info',compact('news'));
    }

    public function animals()
    {
        $news_list = DB::table('animals')->paginate(6);

        return view('front.animals',compact('news_list'));
    }

    public function animals_info($animals_id) //變數$animals_id用來儲存網址抓到的值
    {
        $news = DB::table('animals')->where('id', '=', $animals_id)->first();
        // dd($animals_id);
        return view('front.animals_info',compact('news'));

    }

    // public function animals_info(Request $request) //舊規格取值寫法
    // {
    //     dd($request->all());
    //     dd($request->animals_info());
    // }

    public function store_contact(Request $hello)
    {
        // dd($hello->all());

        // DB::table('place')->insert(
        //     ['email' => $hello->email,
        //      'location' => $hello->location,
        //      'file' => '',
        //      'place_name' => $hello->place_name,
        //      'description' => $hello->description ]
        // );

        Place::create($hello->all());
        return 'GooD';
    }
}
