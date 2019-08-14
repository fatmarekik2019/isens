@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@endsection

@section('header')
    @include('frontOffice.inc.header')
@endsection

@section('content')
<div id="PageWrapper">
	<div class="pageMain">
		<!-- Page Content -->
		<div class="contentArea">
			<div class="two-thirds">
				<!-- Title / Page Headline -->				
				<div class="hr"></div>
				<!-- Breadcrumbs -->
				<p class="breadcrumbs">
					<a href="index.php">Home</a>
				</p>
				<!-- Blog Post -->
				<div class="ribbon">
					<div class="wrapAround"></div>
					<div class="tab">
					<span >Login error</span></div>
				</div>
				<p>This username and password combination does not match our records. Please try again.</p>					<!-- Blog Post --><!-- Blog Post --><!-- End of Content -->
			  	<div class="clear"></div>					
			</div>
			<!-- End of Content -->
			<div class="clear"></div>	
		</div>
	</div>
</div>
@endsection

@section('footer')
	@include('frontOffice.inc.footer')
@endsection