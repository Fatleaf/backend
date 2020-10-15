@extends('layouts.app')

@section('css')

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">後台</a></li>
        <li class="breadcrumb-item"><a href="/admin/product">商品管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">編輯</li>
    </ol>
</nav>
{{-- {{$product}} --}}
<form method="POST" action="/admin/product/update/{{$product->id}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">標題 <small class="text-danger">最多20個字</small></label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{$product->name}}">
    </div>
    <img width="200px" src="{{$product->image}}" alt="">
    <div class="form-group">
        <label for="image">上傳圖片 <small class="text-danger">圖片寬高比例為4:3</small></label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    {{-- <div>
        原本的多張圖片
        @foreach ($product->product_imgs as $product_img)
        <img height="200" src="{{$product_img->img_url}}" alt="">
        @endforeach
    </div> --}}
    <div class="form-group row">
        <label for="img" class="col-sm-2 col-form-label">現有產品組圖片</label>
        @foreach ($product->product_imgs as $product_img)
        <div class="col-sm-2 product_imgs" data-productimgid="{{$product_img->id}}">
            <img class="img-fluid" src="{{$product_img->img_url}}" alt="">
        <button class="btn btn-danger btn-sm" data-productimgid="{{$product_img->id}}" type="button">X</button>
            <div class="sort">
                <label for="imgs">Sort</label>
                <input class="form-control" type="text">
            </div>
        </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="multiple-images">上傳多張圖片 <small class="text-danger">圖片寬高比例為4:3</small></label>
        <input type="file" class="form-control-file" id="multiple-image" name="multiple-image[]" multiple>
    </div>
    {{-- {{$product->product_imgs}} --}}
    <div class="form-group">
        <label for="product_type_id">商品類別</label>
        <select class="form-control" id="product_type_id" name="product_type_id">
          @foreach ($product_types as $product_type)
          <option value="{{$product_type->id}}" @if($product_type->id == $product->product_type_id) selected @endif>{{$product_type->type_name}}</option>
          @endforeach
          {{-- <option value="1">飯類</option>
          <option value="2">麵類</option>
          <option value="3">飲品</option>
          <option value="4">湯類</option> --}}

          {{-- @if($product_type->id == $porduct->product_type_id) selected @endif --}}
        </select>
    </div>
    <div class="form-group">
        <label for="price">價格</label>
        <input type="text" class="form-control" id="price" aria-describedby="price" name="price" value="{{$product->price}}">
    </div>
    <div class="form-group">
        <label for="info">介紹</label>
        <textarea class="form-control" id="info" rows="3" name="info">{{$product->info}}</textarea>
      </div>
    <button type="submit" class="btn btn-primary">送出</button>
</form>
@endsection

@section('js')

{{-- 刪除按鈕的彈跳視窗JS --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

     $(document).ready(function() {

        $('.product_imgs .btn-danger').click(function () {

            var product_imgs_id = $(this).data('productimgid');

            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                method: 'POST',
                                url: '/admin/ajax_delete_product_imgs',
                                data: {product_imgs_id: product_imgs_id},
                                success: function (res) {
                                    $( `.product_imgs[data-productimgid='${product_imgs_id}']` ).remove();
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.error(textStatus + " " + errorThrown);
                                }
                            });
                        }
                })

        });

        
    });
</script>
@endsection
