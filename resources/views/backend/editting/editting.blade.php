@extends('backend.components.index')

@section('content')
<section class=" app-content content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$breadcrumb}}</h1>
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
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body p-0">
                
                <form id="cerfitication" action="" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" id="name" name="name" value="{{$profile->name}}" class="form-control" placeholder="Nhập tên">
                                        @error('title')
                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-1 mb-1">
                                        <label for="inputName" class="form-label mb-1">Địa chỉ</label>
                                        <input type="text" id="address" name="address"  value="{{$profile->address}}" class="form-control" placeholder="Nhập địa chỉ">
                                        @error('address')
                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-1 mb-1">
                                        <label for="seo_title" class="form-label mb-1">Thời gian mở cửa</label>
                                        <input type="text" id="time" name="time" value="{{$profile->time}}" class="form-control" placeholder="Nhập thời gian">
                                    </div>
                                    <div class="form-group mt-1 mb-1">
                                        <label for="inputName" class="form-label mb-1">Địa chỉ email</label>
                                        <input type="text" id="email" name="email" value="{{$profile->email}}" class="form-control" placeholder="Nhập email">
                                        @error('title')
                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-1 mb-1">
                                        <label for="inputName" class="form-label mb-1">Số điện thoại</label>
                                        <input type="text" id="hotline" name="hotline" value="{{$profile->hotline}}" class="form-control" placeholder="Nhập số điện thoại">
                                        @error('title')
                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-1 mb-1">
                                        <label for="inputName" class="form-label mb-1">Video</label>
                                        <input type="text" id="video" name="video" value="{{$profile->video}}" class="form-control" placeholder="Nhập đường link video">
                                        @error('video')
                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-1 mb-1">
                                        <label for="inputName" class="form-label mb-2">Mạng xã hội: </label>
                                        <br>
                                        <label for="inputName" class="form-label mb-1 ps-1">Facebook</label>
                                        <input type="text" id="network_fb" name="network_fb" value="{{$profile->network_fb}}" class="form-control" placeholder="Nhập link fb">
                                        <br>
                                        <label for="inputName" class="form-label mb-1 ps-1">Instagram</label>
                                        <input type="text" id="network_ins" name="network_ins" value="{{$profile->network_ins}}" class="form-control" placeholder="Nhập link intergram">
                                        <br>
                                        <label for="inputName" class="form-label mb-1 ps-1">Tiktok</label>
                                        <input type="text" id="network_tiktok" name="network_tiktok" value="{{$profile->network_tiktok}}" class="form-control" placeholder="Nhập link tiktok">
                                        <br>
                                        <label for="inputName" class="form-label mb-1 ps-1">Shopee</label>
                                        <input type="text" id="network_shopee" name="network_shopee" value="{{$profile->network_shopee}}" class="form-control" placeholder="Nhập link shopee">
                                        @error('social_network')
                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mt-1 mb-1">
                                                <label for="seo_keyword" class="form-label mb-1">Google Maps</label>
                                                <input type="text" id="google_map" name="google_map" value="{{$profile->google_map}}" class="form-control" placeholder="Nhập iframe">
                                                @if ($errors->has('google_map'))
                                                    <span class="text-danger d-block mt-1">{{ $errors->first('seo_keyword') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mt-1 mb-1">
                                                <label for="seo_keyword" class="form-label mb-1">Seo title</label>
                                                <input type="text" id="seo_title" name="seo_title" value="{{$profile->seo_title}}" class="form-control">
                                                @if ($errors->has('seo_title'))
                                                    <span class="text-danger d-block mt-1">{{ $errors->first('seo_keyword') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mt-1 mb-1">
                                                <label for="seo_keyword" class="form-label mb-1">Seo description</label>
                                                <input type="text" id="seo_description" name="seo_description" value="{{$profile->seo_description}}" class="form-control">
                                                @if ($errors->has('seo_description'))
                                                    <span class="text-danger d-block mt-1">{{ $errors->first('seo_keyword') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mt-1 mb-1">
                                                <label for="seo_keyword" class="form-label mb-1">Seo keyword</label>
                                                <input type="text" id="seo_keyword" name="seo_keyword" value="{{$profile->seo_keyword}}" class="form-control">
                                                @if ($errors->has('seo_keyword'))
                                                    <span class="text-danger d-block mt-1">{{ $errors->first('seo_keyword') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="logo"  value="{{$profile->logo}}">
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12  ps-5 mb-2">
                            <a href="{{route('admin.home')}}" class="btn btn-secondary">Quay lại</a>
                            <input type="submit" value="Chỉnh sửa" class="btn btn-success float-right ms-2">
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-12">
        <div class="card card-app-design">
            <div class="card-body">
                <div id="imgList" 
                    style="
                        width: 230px;
                        height: 230px;
                        overflow: hidden;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin: 0 auto;
                        margin-bottom: 20px;
                    ">
                    <img style="width:100%; height:100%; border-radius:50%; object-fit:cover;" id="thumbnail_prev" src="{{asset($profile->logo)}}"  alt="..">
                </div>
                <button class="btn btn-primary btn-toggle-sidebar w-100 waves-effect waves-float waves-light" id="popup-1-button">
                    <span class="align-middle">Chọn ảnh logo</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /.card -->
<script>
    console.log();
    $('input[name="name"]')
    function xoa_dau(str) {
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
        str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
        str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
        str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
        str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
        str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
        str = str.replace(/Đ/g, "D");
        return str
    }
    $('input[name="name"]').change(function() {
         var s = xoa_dau($('input[name="name"]').val())
        result = s.replaceAll(' ', '-')
        $('input[name="slug"]').val(result)
    })

</script>
</section>


<script>
    
    var button = document.getElementById( 'popup-1-button' );
    
    function selectFileWithCKFinder() {
        CKFinder.modal( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var img = document.getElementById('thumbnail_prev')
                    var thumbnail = file.getUrl();
                    $('input[name="logo"]').val(`${thumbnail}`);
                    img.src = `${thumbnail}`;    
                } );
            }
        } );
    }
    button.onclick =() => {
        selectFileWithCKFinder( 'ckfinder-input-1' );
    }
   
</script>
<script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endsection

@section('script')
<script src="{{asset('ckfinder/ckfinder.js')}}" ></script>
@endsection