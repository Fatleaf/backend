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
                <th>上市時間</th>
                <th width="120px">編輯</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{$product_types->type_name}} --}}
            @foreach ($item_list as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td><img width="200px" src="{{$value->image}}" alt=""></td>
                {{-- <td><img width="200px" src="{{asset('/storage/'.$value->img_url)}}" alt=""></td> --}}

                {{-- <td>{{$value->product_type_id}}</td> --}}
                <td>{{$value->product_type->type_name}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->info}}</td>
                <td>{{$value->date}}</td>

                <td>
                    <a href="/admin/product/edit/{{$value->id}}" class="btn btn-sm btn-info">編輯</a>
                    <button class="btn btn-sm btn-danger btn-delete" data-newsid="{{$value->id}}">刪除</button>
                    {{-- <form id="logout-form-{{$product_type->id}}" action="/admin/productType/{{$product_type->id}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    {{-- 刪除按鈕的彈跳視窗JS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- order這邊在排序，要注意誰->"數字"在排序 --}}
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "order": [[ 3, "desc" ]],
                language: {
                        "processing":   "處理中...",
                        "loadingRecords": "載入中...",
                        "lengthMenu":   "顯示 _MENU_ 項結果",
                        "zeroRecords":  "沒有符合的結果",
                        "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                        "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
                        "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                        "infoPostFix":  "",
                        "search":       "搜尋:",
                        "paginate": {
                            "first":    "第一頁",
                            "previous": "上一頁",
                            "next":     "下一頁",
                            "last":     "最後一頁"
                        },
                        "aria": {
                            "sortAscending":  ": 升冪排列",
                            "sortDescending": ": 降冪排列"
                        }
                    }
            });

        });
        // 此處的"#example"是table的ID名稱，".btn-delete"是誰->(按鍵)
        $("#example").on("click", ".btn-delete", function(){
            console.log(this.dataset.newsid);
                var news_id = this.dataset.newsid;

                // 基本款 >>
                // var yes = confirm('你確定要刪除嗎？');//confirm->js彈出是視窗並帶有yes/no
                // if (yes) {
                //     window.location.href = `/admin/product/destroy/${news_id}`;
                // } else {
                //     alert('你按了取消按鈕');
                // }

                // 高級款 by sweetalert2 >>
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
                            window.location.href = `/admin/product/destroy/${news_id}`;
                            // Swal.fire(
                            // 'Deleted!',
                            // 'Your file has been deleted.',
                            // 'success'
                            // )
                        }
                })

        });



    </script>

@endsection
