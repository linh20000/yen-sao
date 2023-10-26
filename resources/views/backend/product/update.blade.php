@extends('backend.components.index')

@section('content')
    <section class=" app-content content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">{{ $breadcrumb }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
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
        <form id="cerfitication" action="{{route('admin.updateProduct', $product->id)}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body p-0">
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
                                                <label for="inputName" class="form-label mb-1">Tên</label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ $product->name }}" class="form-control"
                                                    placeholder="Nhập tên">
                                                @error('name')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="inputName" class="form-label mb-1">Mã sản phẩm</label>
                                                <input type="text" id="code" name="code"
                                                    value="{{ $product->code }}" class="form-control"
                                                    placeholder="Nhập mã sản phẩm">
                                                @error('code')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="qty" class="form-label mb-1">Số lượng</label>
                                                <input type="number" id="qty" name="qty"
                                                    value="{{ $product->qty }}" class="form-control"
                                                    placeholder="Nhập mã sản phẩm">
                                                @error('qty')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="category_id" class="form-label mb-1">Danh mục</label>
                                                <select class="form-control custom-select" name="category_id"
                                                    id="category_id" placeholder="">
                                                    <option value="{{ $product->category_id }}" selected>{{ $product->category_id }}</option>
                                                    @foreach ($category_id as $item)
                                                        @if ($product->category_id != $item->name)
                                                            <option value="{{ $item->name }}">
                                                                {{ $item->name }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="oldPrice" class="form-label mb-1">Giá gốc</label>
                                                <input type="number" id="oldPrice" name="oldPrice"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                                    value="{{ $product->oldPrice }}" class="form-control"
                                                    placeholder="Nhập giá gốc">
                                                @error('oldPrice')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="percent_discount" class="form-label mb-1">Giảm giá %</label>
                                                <input type="number" id="percent_discount" name="percent_discount"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '')" min="0"
                                                    max="100" value="{{ $product->percent_discount }}"
                                                    class="form-control" placeholder="Nhập phần trăm giảm giá ">
                                                @error('percent_discount')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="salePrice" class="form-label mb-1">Giá hiện tại</label>
                                                <input type="text" id="salePrice" name="salePrice"
                                                    value="{{ $product->salePrice }}"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                                    class="form-control"
                                                    placeholder="Bạn cũng có thể nhập giá hiện tại tại đây!">
                                                @error('salePrice')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="form-label mb-1">Trạng thái</label>
                                                <select class="form-control custom-select" name="status" id="status">
                                                    @if ($product->status == '0')
                                                        <option value="0">Hết hàng</option>
                                                        <option value="1">Còn hàng</option>
                                                    @else
                                                        <option value="1">Còn hàng</option>
                                                        <option value="0">Hết hàng</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group mt-1 mb-1">
                                                <label for="description" class="form-label mb-1">Mô tả</label>
                                                <textarea class="form-control" id="summary-ckeditor" name="description">{{ $product->description }}</textarea>
                                                @error('seo_description')
                                                    <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mt-3"></div>
                                            <div class="">
                                                <h3 class="card-title">Thông tin tìm kiếm</h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1 mb-1">
                                                        <label for="seo_keyword" class="form-label mb-1">Seo
                                                            keyword</label>
                                                        <input type="text" id="seo_keyword" name="seo_keyword"
                                                            value="{{ $product->seo_keyword }}" class="form-control">
                                                        @if ($errors->has('seo_keyword'))
                                                            <span
                                                                class="text-danger d-block mt-1">{{ $errors->first('seo_keyword') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1 mb-1">
                                                        <label for="seo_description" class="form-label mb-1">Seo
                                                            description</label>
                                                        <input type="text" id="seo_description" name="seo_description"
                                                            value="{{ $product->seo_description }}" class="form-control">
                                                        @if ($errors->has('seo_description'))
                                                            <span
                                                                class="text-danger d-block mt-1">{{ $errors->first('seo_description') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1 mb-1">
                                                        <label for="seo_title" class="form-label mb-1">Seo title</label>
                                                        <input type="text" id="seo_title" name="seo_title"
                                                            value="{{ $product->seo_title }}" class="form-control">
                                                        @if ($errors->has('seo_title'))
                                                            <span
                                                                class="text-danger d-block mt-1">{{ $errors->first('seo_title') }}</span>
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
                                    <a href="{{ route('admin.showProductList') }}" class="btn btn-secondary">Quay lại</a>
                                    <input type="submit" value="Chỉnh sửa" class="btn btn-success float-right ms-2">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="card card-app-design">
                        <div class="card-body">
                            <style>
                                .img_product {
                                    position: relative;
                                    padding-bottom: 1rem;
                                    padding-right: 0;
                                }

                                #imgArrList img {
                                    display: block;
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                }

                                .img_remove {
                                    position: absolute;
                                    z-index: 1;
                                    right: 0;
                                    top: 0;
                                    background-color: black;
                                    color: white;
                                    font-weight: 500;
                                }
                            </style>
                            <div id="imgArrList" class="row">
                                @foreach (array_keys(JSON_decode($product->images)) as $key)
                                    <div class="img_product col-6">
                                        <input type="hidden" name="images[]"
                                            value="{{ JSON_decode($product->images)[$key] }}" />
                                        <img src="{{ asset(JSON_decode($product->images)[$key]) }}" alt="">
                                        <button type="button" class="img_remove ">X</button>
                                    </div>
                                @endforeach
                            </div>

                            <button class="btn btn-primary btn-toggle-sidebar w-100 waves-effect waves-float waves-light"
                                id="popup-1-button" type="button">
                                <span class="align-middle">Chọn ảnh</span>
                            </button>



                            @if ($errors->has('images'))
                                <span class="text-danger d-block mt-1">{{ $errors->first('images') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </section>
    <script>
        var button = document.getElementById('popup-1-button');

        function selectFileWithCKFinder() {
            CKFinder.modal({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var arr_file = evt.data.files.first();
                        var img_arr = arr_file.getUrl();
                        var datas = evt.data.files;
                        $('#array_prev_empty').remove();
                        console.log(datas);
                        datas.map(e => {
                            $('#imgArrList').append(
                                `<div class="img_product col-6"><input type="hidden" name="images[]" value="${e.getUrl()}"> <img id="img_arr_prev" src="${e.getUrl()}" class="mx-auto h-auto w-full object-cover" alt=""><button type="button" class="img_remove">X</button></img></div>`
                            );
                        })
                    });
                }
            });
        }
        button.onclick = () => {
            selectFileWithCKFinder('ckfinder-input-1');
        }

        $('input[name="percent_discount"]').change(function() {
            var value_oldPrice = parseInt($('input[name="oldPrice"]').val());
            var value_percent_discount = parseInt($('input[name="percent_discount"]').val());
            value_salePrice = value_oldPrice * (100 - value_percent_discount) / 100;
            $('input[name="salePrice"]').val(value_salePrice)
        })
        $('input[name="salePrice"]').change(function() {
            var value_oldPrice = parseInt($('input[name="oldPrice"]').val());
            var value_salePrice = parseInt($('input[name="salePrice"]').val());
            var value_percent_discount = value_salePrice * (100 / value_oldPrice);
            var result = parseFloat(Math.round(100 - value_percent_discount))
            $('input[name="percent_discount"]').val(result)
        })

        $(document).ready(function() {
            $("body").on("click", ".img_remove", function() {
                $(this).closest(".img_product").remove();
            });
        });
    </script>

    <script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
    <script>
        CKEDITOR.replace('summary-ckeditor');
    </script>
@endsection
