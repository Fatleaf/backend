@extends('layouts/nav_footer')

@section('css')
<link rel="stylesheet" href="/css/news_info.css">
@endsection

@section('content')

        <section class="news_info">
            <div class="container">
                <h2 class="info_title">{{$news->title}}</h2>
                <div class="row">
                    <div class="col-12 my-3 my-md-0 col-md-6">
                        <div class="image_box h-100">
                            <a href="./images/index/news/news_example.JPG" data-lightbox="image-1" data-title="My caption">
                                <img width="100%" src="{{$news->img_url}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-3 my-md-0 col-md-6">
                        <div class="info_content">
                            <h3>{{$news->sub_title}}</h3>
                            {{$news->content}}
                        </div>
                        {{-- <button class="btn btn-danger addcart" data-productid="{{$product->id}}">加入購物車</button> --}}
                    </div>
                </div>
            </div>
        </section>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<script>
    $('.addcart').click(function () {
    var product_id = $(this).data('productid');
    console.log(product_id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
            method: 'POST',
            url: '/addProductToCar',
            data: {product_id:product_id},
            success: function (res) {
                $('#cartTotalQuantity').text(res);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    });
</script>
@endsection

