@extends('frontend.components.index')
@section('content')


@include('frontend.home.banner')
@include('frontend.home.category')
@include('frontend.home.about_us')
@include('frontend.home.product_portfolio')
@include('frontend.home.contact')
@include('frontend.home.product_hot')
@include('frontend.home.blog_new')
@include('frontend.home.top_trademark')



@endsection
@section('scripts')
<script>
    function addCartajax(params) {
    $.ajax({
        type: 'POST',
        url: "{{ route('addCartajax') }}",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            productId: params,
        },
        success: function(response) {
            toastr.success('Đã thêm vào giỏ hàng!')
            $('.count_item_pr').text(response.qty)
        }
    })
}
</script>
@endsection