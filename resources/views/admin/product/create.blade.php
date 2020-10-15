@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">後台</a></li>
        <li class="breadcrumb-item"><a href="/admin/product">商品管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">新增最新商品</li>
    </ol>
</nav>
<form method="POST" action="/admin/product/store" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">商品名稱 <small class="text-danger">最多20個字</small></label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="image">上傳圖片 <small class="text-danger">圖片寬高比例為4:3</small></label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="multiple-images">上傳多張圖片 <small class="text-danger">圖片寬高比例為4:3</small></label>
        <input type="file" class="form-control-file" id="multiple-image" name="multiple-image[]" multiple required>
    </div>
    <div class="form-group">
        <label for="product_type_id">商品類別</label>
        <select class="form-control" id="product_type_id" name="product_type_id">
          @foreach ($product_types as $product_type)
          <option value="{{$product_type->id}}">{{$product_type->type_name}}</option>
          @endforeach
          {{-- <option value="1">飯類</option>
          <option value="2">麵類</option>
          <option value="3">飲品</option>
          <option value="4">湯類</option> --}}
        </select>
    </div>
    <div class="form-group">
        <label for="price">價格</label>
        <input type="text" class="form-control" id="price" aria-describedby="price" name="price" required>
    </div>
    <div class="form-group">
        <label for="info">介紹</label>
        <textarea class="form-control" id="info" rows="3" name="info"></textarea>
      </div>
    <div class="form-group">
        <label for="date">上市日期</label>
        <input type="text" class="form-control" id="date" aria-describedby="date" name="date">
    </div>
    <button type="submit" class="btn btn-primary">送出</button>
</form>

@endsection

@section('js')

{{-- summernote js --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="/js/summernote/lang_ZH_TW.js"></script>

<script>
     $(document).ready(function() {
        $('#info').summernote({
            height: 150,
            lang: 'zh-TW',
            callbacks: {
                onImageUpload: function(files) {
                    for(let i=0; i < files.length; i++) {
                        $.upload(files[i]);
                    }
                },
                onMediaDelete : function(target) {
                    $.delete(target[0].getAttribute("src"));
                }
            },
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                ]
            }
        });


        $.upload = function (file) {
            let out = new FormData();
            out.append('file', file, file.name);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/admin/ajax_upload_img',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function (img) {
                    $('#info').summernote('insertImage', img);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };

        $.delete = function (file_link) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/admin/ajax_delete_img',
                data: {file_link:file_link},
                success: function (img) {
                    console.log("delete:",img);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        }
   });
</script>
@endsection
