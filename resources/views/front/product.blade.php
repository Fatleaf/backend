@extends('layouts/nav_footer')


@section('css')
<link rel="stylesheet" href="/css/news.css">
@endsection

@section('content')

    <section class="news">
        <div class="container">
            <h2 class="news_title">美味商品</h2>

            <div class="row news_lists">
                @foreach ($item_list as $value)
                <div class="col-md-4">
                    <div class="news_list">
                        <h3>{{$value->name}}</h3>
                        <h4>{{$value->class}}</h4>
                        <img width="100%" src="{{$value->image}}" alt="圖片建議尺寸: 1000 x 567">
                        <p class="news_content">價格:{{$value->price}}</p>
                        <p class="news_content">{{$value->info}}</p>
                        {{-- <a class="btn btn-success" href="/product_info/{{$value->id}}" role="button">點擊查看更多 &raquo;</a> --}}
                    </div>
                </div>
                @endforeach
            </div>

            {{ $item_list->links() }}

        </div>
    </section>


@endsection
