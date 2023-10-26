@extends('frontend.components.index')

@section('content')
    @include('frontend.components.breadcrumb', ['name' => 'Tất cả sản phẩm'])



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

<script>
    $("input[name=prices]").each(function() {
        $(this).click(function(e){
            let prices = []
            $('input[name="prices"]:checked').each(function() {
                prices.push($(this).val());
    
            });
            $.ajax({
                url:`{{route('loc')}}`,
                method:'get',
                data:{prices:prices},
                success:(res)=>{
                    $('#product').html(res.data)
                }
            })
            console.log(prices);
        })
    })
</script>

@endsection
