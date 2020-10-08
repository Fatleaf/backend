@extends('layouts.app')

@section('css')

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">後台</a></li>
        <li class="breadcrumb-item"><a href="/admin/news">資料管理</a></li>
        <li class="breadcrumb-item active" aria-current="page">新增最新消息</li>
    </ol>
</nav>
<form method="POST" action="/admin/news/store" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">標題 <small class="text-danger">最多20個字</small></label>
        <input type="text" class="form-control" id="title" aria-describedby="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="img_url">上傳圖片 <small class="text-danger">圖片寬高比例為4:3</small></label>
        <input type="file" class="form-control-file" id="img_url" name="img_url">
      </div>
    <div class="form-group">
        <label for="sub_title">副標題</label>
        <input type="text" class="form-control" id="sub_title" aria-describedby="sub_title" name="sub_title" required>
    </div>
    <div class="form-group">
        <label for="content">內容</label>
        <textarea class="form-control" id="content" rows="3" name="content"></textarea>
      </div>
    <button type="submit" class="btn btn-primary">送出</button>
</form>

@endsection

@section('js')

@endsection
