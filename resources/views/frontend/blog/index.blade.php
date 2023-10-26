@extends('frontend.components.index')

@section('content')
@include('frontend.components.breadcrumb', ['name'=>'Tin tức'])

@include('frontend.blog.blog_list')
<div class="d-flex justify-content-center text-right">
    <nav class="clearfix nav_pagi f-left w_100">
        {{ $blog_list->links('pagination::bootstrap-4') }}
    </nav>
</div>

@endsection
