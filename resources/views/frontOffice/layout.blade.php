<!DOCTYPE html>
<html>
	@yield('head')
<body>
<div>
	<div id="Wrapper">
    @yield('header')
    @yield('content')
    @yield('footer')
	</div>
</div>
	@include('frontOffice.inc.scripts')
</body>
</html>
