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
        <label for="exampleInputTitle1">標題</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="title" name="title">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">圖片網址</label>
        <input type="text" class="form-control-file" id="exampleFormControlFile1" name="img_url">
    </div>
    <div class="form-group">
        <label for="exampleInput">副標題</label>
        <input type="text" class="form-control" id="exampleInput" aria-describedby="sub_title" name="sub_title">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">內容</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
      </div>
    <button type="submit" class="btn btn-primary">送出</button>
</form>

@endsection

@section('js')

@endsection
