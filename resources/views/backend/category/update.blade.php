@extends('backend.components.index')

@section('content')
<section class=" app-content content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm danh mục</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right justify-content-end">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">{{$breadcrumb}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    @if(session()->has('success'))
        <div class="txt pb-2 pt-2 ps-2 alert alert-success h3">
        {{ session()->get('success') }}
        </div>
    @endif
    <script>
        setTimeout(()=> {
            $('.txt').addClass('d-none')
        },2000)
    </script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body p-0">
                
                <form id="cerfitication" action="{{route('admin.updateCategory',[$category->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mt-1 mb-1">
                                        <label for="inputName" class="form-label mb-1">Tên</label>
                                        <input type="text" id="name" name="name" value="{{$category->name}}" class="form-control" placeholder="Nhập tên">
                                        @error('name')
                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-1 mb-1">
                                        <label for="parent_id" class="form-label mb-1">Danh mục</label>
                                        <select class="form-control custom-select" name="parent_id" id="parent_id" placeholder="">
                                            <option value="0">Danh mục lớn</option>
                                            @foreach($category_id as $parent_category)
                                            <option value="{{$parent_category->id}}">{{$parent_category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3"></div>
                                    <div class="">
                                        <h3 class="card-title">Thông tin tìm kiếm</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-1 mb-1">
                                                <label for="seo_keyword" class="form-label mb-1">Seo keyword</label>
                                                <input type="text" id="seo_keyword" name="seo_keyword" value="{{$category->seo_keyword}}" class="form-control">
                                                @if ($errors->has('seo_keyword'))
                                                    <span class="text-danger d-block mt-1">{{ $errors->first('seo_keyword') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-1 mb-1">
                                                <label for="seo_description" class="form-label mb-1">Seo description</label>
                                                <input type="text" id="seo_description" name="seo_description" value="{{$category->seo_description}}" class="form-control">
                                                @if ($errors->has('seo_description'))
                                                    <span class="text-danger d-block mt-1">{{ $errors->first('seo_description') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-1 mb-1">
                                                <label for="seo_title" class="form-label mb-1">Seo title</label>
                                                <input type="text" id="seo_title" name="seo_title" value="{{$category->seo_title}}" class="form-control">
                                                @if ($errors->has('seo_title'))
                                                    <span class="text-danger d-block mt-1">{{ $errors->first('seo_title') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12  ps-5 mb-2">
                            <a href="{{route('admin.category')}}" class="btn btn-secondary">Quay lại</a>
                            <input type="submit" value="Chỉnh sửa" class="btn btn-success float-right ms-2">
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<!-- /.card -->
</section>


<script>
    
    // var button = document.getElementById( 'popup-1-button' );
    
    // function selectFileWithCKFinder() {
    //     CKFinder.modal( {
    //         chooseFiles: true,
    //         width: 800,
    //         height: 600,
    //         onInit: function( finder ) {
    //             finder.on( 'files:choose', function( evt ) {
    //                 var file = evt.data.files.first();
    //                 var img = document.getElementById('thumbnail_prev')
    //                 var thumbnail = file.getUrl();
    //                 $('input[name="thumbnail"]').val(`${thumbnail}`);
    //                 img.src = `${thumbnail}`;    
    //             } );
    //         }
    //     } );
    // }
    // button.onclick =() => {
    //     selectFileWithCKFinder( 'ckfinder-input-1' );
    // }
   
</script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endsection

@section('script')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckfinder/ckfinder.js')}}" ></script>
@endsection