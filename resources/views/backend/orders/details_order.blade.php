@extends('backend.components.index')

@section('content')
<section class=" app-content content">
    <!-- Default box -->
    
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right justify-content-end">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">{{$breadcrumb}}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75"></h3>
                        <span>Tổng só sản phẩm : {{$data_details->qty}}</span>
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
    <div class="row">
        <div class="col-12">
             <div class="card">
                <div class="card-body p-0">
                <h2 class="ps-2 pb-2 pt-2">Thông tin địa chỉ</h2>
                    <ul>
                        <li class="pb-1">Tên khách hàng : {{$data_details->name}}</li>
                        <li class="pb-1">Số điện thoại : {{$data_details->phoneNumber}}</li>
                        <li class="pb-1">Tỉnh / Thành phố : {{$data_details->province}}</li>
                        <li class="pb-1">Quận / Huyện : {{$data_details->district}}</li>
                        <li class="pb-1">Địa chỉ : {{$data_details->address}}</li>
                        <li class="pb-1">Ghi chú : {{$data_details->note}}</li>
                    </ul>
                    <div class="table-responsive-xl">
                        <table class="table table-striped projects">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10%">
                                        Hình ảnh
                                    </th>
                                    <th style="width: 1%">
                                        Sl
                                    </th>
                                    <th style="width: 15%">
                                        Giá
                                    </th>
                                    <th style="width: 15%" class="text-right">
                                        Tổng tiền
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($decode_product as $item)
                                
                                <tr id="row" class="text-center">
                                    <td style="display: flex; justify-content: center;">
                                        <div style="max-width:90px; min-width:80px; max-height:80px; overflow:hidden; display:flex;">
                                            <img style="width:100%;" src="{{asset(JSON_decode($item->options->images)[0])}}" alt="{{$item->name}}">
                                        </div>
                                    </td>
                                    <td style="max-width:90px;"> 
                                        <a style="word-wrap: break-word;white-space: normal;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2; ">
                                            {{$item->qty}}
                                        </a>
                                    </td>
                                    <td style="max-width:90px; padding:0 10px;"> 
                                        <a style="display:-webkit-box;word-wrap: break-word;white-space: normal;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2; ">
                                            {{$item->price}} đ
                                        </a>
                                    </td>
                                    <td class=""  style="max-width:90px; padding:0 10px;">
                                        <a style="display:-webkit-box;word-wrap: break-word;white-space: normal;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2; ">
                                            {{$item->price * $item->qty}} đ
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="total d-flex flex-column align-items-end pt-1 pb-1 pe-2">
                        <span class="pt-1 pb-1">Số lượng : {{$data_details->qty}}</span>
                        <span >Tổng tiền : {{$data_details->total}} đ</span>
                    </div>
                    <br>
                </div>
                
            <div>
        </div>
    </div>
    <div class="wrap d-flex justify-content-between">
        <form action="{{route('updateStatus', $data_details->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <select name="status" id="status" class="btn btn-secondary btn-sm waves-effect waves-float waves-light">
                <option value="0">Xác nhận đơn hàng</option>
                <option value="1">Gỡ xác nhận đơn hàng</option>
            </select>
            <button type="submit" class="btn btn-sm btn-secondary">Update đơn hàng</button>
        </form>
       <div class="action">
        <a href="{{route('showListOrder')}}" class="btn btn-secondary waves-effect waves-float waves-light">Quay lại</a>
       <a href="" class="btn btn-sm btn-icon delete-record btn btn-secondary waves-effect waves-float waves-light"  data-bs-toggle="modal" data-bs-target="#deleteProductModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-2 text-body">
                <polyline points="3 6 5 6 21 6"></polyline>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
            </svg>
        </a>
        <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                        </div>						
                        <h4 class="modal-title w-100">Bạn có chắc không?</h4>	
                    </div>
                    <div class="modal-body">
                        <p>Bạn có thực sự muốn xóa? Quá trình này không thể được hoàn tác.</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Quay lại</button>
                        <a href="{{route('deleteOrder', $data_details->id)}}"  type="button" class="btn btn-danger">Xóa</a>
                    </div>
                </div>
            </div>
        </div>
       </div>
   </div>
</div>
<!-- /.card -->
</section>
@endsection