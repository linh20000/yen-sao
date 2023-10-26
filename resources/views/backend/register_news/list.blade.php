@extends('backend.components.index')

@section('content')
<section class=" app-content content">
    <!-- Default box -->
    @if(session()->has('mess'))
        <div class="txt pb-2 pt-2 ps-2 alert alert-success h3">
        {{ session()->get('mess') }}
        </div>
    @endif
    <script>
        setTimeout(()=> {
            $('.txt').addClass('d-none')
        },2000)
    </script>
    
    <div class="container-fluid">
        
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý email</h1>
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
                            <span>Tổng số email đăng kí: 
                                <b style="font-size: 1.5rem; padding: 1rem;">
                                    {{$emailCount}}
                                </b> 
                            </span>
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
                                    Email
                                </th>
                                <th style="width: 10%">
                                    Thời đăng kí
                                </th>
                                <th style="width: 10%">
                                    Tác vụ
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr id="row" class="text-center">
                                <td>
                                    {{$item->id}}
                                </td>
                                <td >
                                    <a style="word-wrap: break-word;white-space: normal;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2; ">
                                        {{$item->email}}
                                    </a>
                                </td>
                                <td class=""  style="max-width:150px;">
                                    <a style="display:-webkit-box;word-wrap: break-word;white-space: normal;overflow: hidden;display: -webkit-box;text-overflow: ellipsis;-webkit-box-orient: vertical;-webkit-line-clamp: 2; ">
                                        {{$item->created_at}}
                                    </a>
                                </td>
                                <td class="project-actions text-right">
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}" class="btn btn-sm btn-icon delete-record">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-2 text-body">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a href="{{route('deleteEmail',[$item->id])}}"  type="button" class="btn btn-danger">Xóa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<div class="d-flex justify-content-center">
    {{ $data->links('pagination::bootstrap-4') }}
</div>
<!-- /.card -->
</section>
@endsection