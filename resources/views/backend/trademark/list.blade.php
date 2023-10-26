@extends('backend.components.index')

@section('content')
    <div class="app-content content ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right justify-content-end">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ $dataLength }}</h3>
                            <span>Tổng số thương hiệu</span>
                        </div>
                        <div class="avatar bg-light-primary p-50">
                            <span class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user font-medium-4">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session()->has('success'))
            <div class="txt pb-2 pt-2 ps-2 alert alert-success h3">
                {{ session()->get('success') }}
            </div>
        @endif
        <script>
            setTimeout(() => {
                $('.txt').addClass('d-none')
            }, 2000)
        </script>

        <div class="card">
            <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                <h4 class="card-title">Danh sách</h4>
                <a href="{{ route('trademark.create') }}"><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Thêm mới
                    </button></a>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="user-list-table table">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 1%; text-align: center;">
                                Id
                            </th>
                            <th style="width: 20%; text-align: center;">
                                Ảnh
                            </th>
                            <th style="width: 10%">
                                Link
                            </th>
                            <th style="width: 10%">
                                Ngày tạo
                            </th>
                            <th style="width: 10%">
                                Ngày cập nhật
                            </th>
                            <th style="width: 10%; text-align: right;">
                                Tác vụ
                            </th>
                        </tr>
                        @foreach ($trademark as $item)
                            <tr>
                                <th style="text-align: center;">{{ $item->id }}</th>
                                <th style="text-align: center;"><img src="{{ asset($item->images) }}" alt=""
                                        style="width:30%; height: 100%; object-fit: cover;"></th>
                                <th>{{ $item->link }}</th>  
                                <th>
                                    {{ $item->created_at }}
                                </th>
                                <th>
                                    {{ $item->updated_at }}
                                </th>
                                <th style="text-align: right;">
                                    <a href="{{ route('trademark.getUpdate', $item->id) }}" class="btn btn-info btn-sm">Sửa</a>
                                    <a type="button" class="btn btn-danger btn-sm confirm-color"
                                        data-id="{{route('admin.deleteTrademark',[$item->id])}}">Xóa</a>
                                    <!-- <a href="/admin/banner/deletebanner/{{ $item->id }}" type="button" class="btn btn-danger btn-sm waves-effect">Xóa</a> -->
                                </th>
                            </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            {{ $trademark->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
