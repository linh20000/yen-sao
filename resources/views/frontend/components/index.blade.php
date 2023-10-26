<!DOCTYPE html>
<html lang="vi">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    @include('frontend.components.head')
    @yield('head')
</head>
@stack('component-css')

<body>
    @include('frontend.components.header')
    @yield('content')
    @include('frontend.components.footer')

    @include('frontend.components.script_body')

    @yield('scripts')
    
</body>

</html>