@extends('backend.components.index')

@section('content')
<section class=" app-content content">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Trang chủ</h1>
            </div>
            
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75"></h3>
                            <span>Đơn hàng mới </span>
                        </div>
                        <div class="avatar bg-light-primary p-50">
                            <span class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user font-medium-4"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-0 pt-2">
                <div class="table-responsive-xl">
                    <table class="table table-striped projects">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 1%">
                                    Id
                                </th>
                                <th style="width: 10%">
                                    Tên
                                </th>
                                <th style="width: 10%">
                                    số điện thoại
                                </th>
                                <th style="width: 10%">
                                    tổng giá
                                </th>
                                <th style="width: 10%">
                                    Thời gian tạo
                                </th>
                                <th style="width: 10%">
                                    Trạng thái
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $order_list)
                                <tr id="row" class="text-center">
                                    <td>
                                        {{$order_list->id}}
                                    </td>
                                    <td >
                                        <a style="word-wrap: break-word;white-space: normal;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2; ">
                                            {{$order_list->name}}
                                        </a>
                                    </td>
                                    <td style="max-width:110px;"> 
                                        <a style="display:-webkit-box;word-wrap: break-word;white-space: normal;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2; ">
                                            +84{{$order_list->phoneNumber}}
                                        </a>
                                    </td>
                                    <td style="max-width:110px;"> 
                                        <a style="display:-webkit-box;word-wrap: break-word;white-space: normal;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2; ">
                                            {{$order_list->total}} đ
                                        </a>
                                    </td>
                                    <td class=""  style="max-width:150px;">
                                        <a style="display:-webkit-box;word-wrap: break-word;white-space: normal;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2; ">
                                            {{$order_list->created_at->format('d / m / Y')}}
                                        </a>
                                    </td>
                                    <td class=""  style="max-width:150px;">
                                        @if ($order_list->status == 0)
                                            <a class="bg-success d-inline-block  ps-1 pe-1 rounded mb-0 text-white" style="display:-webkit-box;word-wrap: break-word;white-space: normal;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2; ">
                                                Thành công
                                            </a>
                                        @else
                                            <a class="bg-warning d-inline-block  ps-1 pe-1 rounded mb-0 text-white" style="display:-webkit-box;word-wrap: break-word;white-space: normal;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2; ">
                                                Đang xử lí
                                            </a>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
            <!-- /.card-body -->
            <div>
            </div>
        </div>
        <a href="" class="btn  btn-secondary">Xem tất cả</a>
    </div>

<!-- /.card -->
</section>
@endsection





