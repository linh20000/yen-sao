@extends('frontend.components.index')

@section('content')
    @include('frontend.product_details.breadcrumb', [
        'name' => $product_detail->name,
        'category_id' => $product_detail->category_id,
    ])


    @include('frontend.product_details.details')



    <script>
        $('#addCart').click(function(e) {
            e.preventDefault();
            let productId = $('input[name=id]').val();
            let qty = $('input[name=qty]').val();
            $.ajax({
                type: 'POST',
                url: "{{ route('addcart') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    productId: productId,
                    qty: qty,
                },
                success: function(e) {
                    iziToast.success({
                        title: 'Thành công',
                        message: 'Đã thêm vào giỏ hàng',
                        position: 'topRight',
                    });
                    // $('.header-dropdown_content').html(e.data)
                    $('.count_item_pr').text(e.qty)
                    // $('#total-view-cart').text(e.total)
                },
                error: function(error) {
                    iziToast.error({
                        title: 'Thất bại',
                        message: 'Vui lòng kiểm tra lại',
                        position: 'topRight'
                    })
                }
            })
        })
    </script>
@endsection
