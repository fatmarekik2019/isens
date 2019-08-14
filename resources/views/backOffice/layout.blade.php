<!DOCTYPE html>
<html>
@yield('head')
<body>
<div>
    @yield('header')
    @yield('content')
    @yield('footer')
</div>
@include('backOffice.inc.scripts')
</body>
</html>