@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">後台</a></li>
            <li class="breadcrumb-item active" aria-current="page">商品管理</li>
        </ol>

        <a href="/admin/product/create" class="btn btn-success mb-3">新增最新商品</a>
    </nav>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>商品名稱</th>
                <th>圖片</th>
                <th>總類</th>
                <th>價格</th>
                <th>介紹</th>
                <th width="120px">編輯</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_list as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td><img width="200px" src="{{$value->image}}" alt=""></td>
                {{-- <td><img width="200px" src="{{asset('/storage/'.$value->img_url)}}" alt=""></td> --}}

                <td>{{$value->class}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->info}}</td>

                <td>
                    <a href="product/edit/{{$value->id}}" class="btn btn-sm btn-info">編輯</a>
                    <a href="product/destroy/{{$value->id}}" class="btn btn-sm btn-danger">刪除</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>商品名稱</th>
                <th>圖片</th>
                <th>總類</th>
                <th>價格</th>
                <th>介紹</th>
                <th>編輯</th>
            </tr>
        </tfoot>
    </table>
@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

@endsection
