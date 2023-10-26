@extends('frontend.components.index')

@section('content')
    @include('frontend.components.breadcrumb', ['name' => $name ])

    @include('frontend.product.list')
    

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
