@extends('layouts/nav_footer')


@section('css')
<link rel="stylesheet" href="/css/news.css">
@endsection

@section('content')

    <section class="news">
        <div class="container">
            <h2 class="news_title">美味商品</h2>

            <div class="row news_lists">
                {{-- {{$product_types}} --}}

                @foreach ($product_types as $product_type)
                <div class="col-md-4">
                    <div class="news_list">
                        <h3>{{$product_type->type_name}}</h3>
                        @foreach ($product_type->products as $product)
                            <h3>{{$product->name}}</h3>
                            <img width="100%" src="{{$product->image}}" alt="圖片建議尺寸: 1000 x 567">
                            <p class="news_content">價格:{{$product->price}}
                            <p class="news_content">{{$product->info}}
                            <a class="btn btn-success" href="/product_detail/{{$product->id}}" role="button">點擊查看更多 &raquo;</a>
                        @endforeach
                        {{-- <h4>{{$product_type->class}}</h4>
                        <img width="100%" src="{{$product_type->image}}" alt="圖片建議尺寸: 1000 x 567">
                        <p class="news_content">價格:{{$product_type->price}}</p>
                        <p class="news_content">{{$product_type->info}}</p> --}}
                        {{-- <a class="btn btn-success" href="/product_info/{{$value->id}}" role="button">點擊查看更多 &raquo;</a> --}}
                    </div>
                </div>
                @endforeach
            </div>

            {{-- {{ $product_types->links() }} --}}

        </div>
    </section>


@endsection
