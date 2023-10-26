@extends('frontend.components.index')

@section('content')
    @include('frontend.components.breadcrumb', ['name' => 'Giỏ hàng của bạn'])

    @include('frontend.shopping_cart.content')


@endsection
