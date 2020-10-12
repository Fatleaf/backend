@extends('layouts.app')

@section('css')

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
    {{-- <div class="form-group">
        <label for="class">總類</label>
        <input type="text" class="form-control" id="class" aria-describedby="class" name="class" required>
    </div> --}}
    <div class="form-group">
        <label for="class">您推薦的景點位置</label>
        <select class="form-control" id="class" name="class">
          <option value="1">飯類</option>
          <option value="2">麵類</option>
          <option value="3">飲品</option>
          <option value="4">湯類</option>
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
        <input type="text" class="form-control" id="date" aria-describedby="date" name="date" required>
    </div>
    <button type="submit" class="btn btn-primary">送出</button>
</form>

@endsection

@section('js')

@endsection
