@extends('backend.components.index')

@section('content')
    <div class="app-content content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right justify-content-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="txt pb-2 pt-2 ps-2 alert alert-success h3">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="txt pb-2 pt-2 ps-2 alert alert-danger h3">
                {{ session()->get('error') }}
            </div>
        @endif
        <script>
            setTimeout(() => {
                $('.txt').addClass('d-none')
            }, 3000)
        </script>
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body p-0">

                        <form action="{{ $blog_detail->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Thông tin</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mt-1 mb-1">
                                                <label for="inputName" class="form-label mb-1">Tên:</label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ $blog_detail->name }}" class="form-control"
                                                    placeholder="Nhập tên">
                                                @error('name')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="inputName" class="form-label mb-1">Tên phụ:</label>
                                                <input type="text" id="subname" name="subname"
                                                    value="{{ $blog_detail->subname }}" class="form-control"
                                                    placeholder="Nhập tên phụ">
                                                @error('subname')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="inputName" class="form-label mb-1">Miêu tả:</label>
                                                <input type="text" id="seo_description" name="seo_description"
                                                    value="{{ $blog_detail->seo_description }}" class="form-control"
                                                    placeholder="Nhập miêu tả">
                                                @error('seo_description')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="inputName" class="form-label mb-1">Tiêu đề - tìm kiếm:</label>
                                                <input type="text" id="seo_title" name="seo_title"
                                                    value="{{ $blog_detail->seo_title }}" class="form-control"
                                                    placeholder="Nhập tiêu đề">
                                                @error('seo_title')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="description" class="form-label mb-1">Mô tả:</label>
                                                <textarea class="form-control" id="summary-ckeditor" name="description">{{ $blog_detail->description }}</textarea>
                                                @error('description')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="inputName" class="form-label mb-1">Từ khóa:</label>
                                                <input type="text" id="seo_keyword" name="seo_keyword"
                                                    value="{{ $blog_detail->seo_keyword }}" class="form-control"
                                                    placeholder="Nhập  từ khóa ">
                                                @error('seo_keyword')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <input type="hidden" name="image" value="{{ $blog_detail->image }}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12  ps-5 mb-2">
                                    <a href="{{ route('blog.list') }}" class="btn btn-secondary">Quay lại</a>
                                    <input type="submit" value="Chỉnh sửa" class="btn btn-success float-right ms-2">
                                </div>
                            </div>
                        </form>
                    </div>
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
                            <img style="width:100%; height:100%; border-radius:50%; object-fit:cover;" id="img_blog"
                                src="{{ asset($blog_detail->image) }}" alt="..">
                        </div>
                        <button class="btn btn-primary btn-toggle-sidebar w-100 waves-effect waves-float waves-light"
                            id="popup-1-button">
                            <span class="align-middle">Chọn ảnh</span>
                        </button>
                        @error('image')
                            <span class="text-danger mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        var button = document.getElementById('popup-1-button');

        function selectFileWithCKFinder() {
            CKFinder.modal({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var file = evt.data.files.first();
                        var img = document.getElementById('img_blog')
                        var image = file.getUrl();
                        $('input[name="image"]').val(`${image}`);
                        img.src = `${image}`;
                    });
                }
            });
        }
        button.onclick = () => {
            selectFileWithCKFinder('ckfinder-input-1');
        }
    </script>
@endsection

@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>

    <script>
        var editor = CKEDITOR.replace('summary-ckeditor');
        CKFinder.setupCKEditor(editor);
    </script>
@endsection
