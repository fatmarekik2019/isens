@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@endsection

@section('header')
    @include('frontOffice.inc.header')
@endsection

@section('content')

{!! Toastr::render() !!}
	<div id="PageWrapper">
		<div id="Slideshow">
			<div id="SlideTop"></div>
			<div id="SlideRepeat"></div>
			<div id="SlideBottom"></div>
			<div id="Slides">
				<a href="#"><img src="images/slideshow/slide-1.png" width="948" height="340" alt="Slide 1" /></a>
				<img src="images/slideshow/slide-2.png" width="948" height="341" alt="Slide 2" />
				<a href="#"><img src="images/slideshow/slide-3.png" width="948" height="341" alt="Slide 3" /></a>
				<img src="images/slideshow/slide-4.png" width="948" height="341" alt="Slide 4" />
		  	</div>
			<a href="#" class="slidePrev"></a>
			<a href="#" class="slideNext"></a>
			<div id="slidePager"></div>
		</div>
		<div class="pageMain">
			<!-- Showcase Content --><!-- Page Content -->
	 		<div class="contentArea">
				<div class="full-page">
				<!-- Welcome Message / Page Headline -->
					<p>
	                  <h1 class="headline">Welcome on the Website dedicated to <strong >iSens Diffuser.</strong>You can discover <strong>the range</strong> of diffusers, and <strong>schedule</strong> those by <strong>login on the site</strong>. </h1>
					  <p>The iSens Diffuser range grows and now offers a 
	scheduling easier and faster through the website.<p> Click on "Scheduling" and access to the dedicated area.</p>	</p>
					  <!-- Featured Content -->
				  	<div class="ribbon">
						<div class="wrapAround"></div>
						<div class="tab">
							<span>Les Diffuseurs iSens</span>
						</div>
				  	</div>
					<div class="featuredContent">
						<!-- Featured Item -->
						<div class="featuredItem">
							<a href="images/content/classic.jpg" class="featuredImg img zoom" rel="featured"><img src="images/content/classic.png" alt="iSens Classic" /></a>
			  				<div class="featuredText">
								<h1 class="title"> iSens Classic <span>The original diffuser to discover or rediscover</span> </h1>
								<a href="gammes.php">Read More...</a>
							</div>
						</div>
						<!-- Featured Item -->
						<div class="featuredItem">
							<a href="images/content/demo-only/featured-2.jpg" class="featuredImg img zoom" rel="featured"><img src="images/content/hvac.png" alt="iSens HVAC" /></a>
							<div class="featuredText">
	                            <h1 class="title">iSens HAVC<span>The iSens for air conditioning and open spaces</span> </h1>
								<a href="gammes.php">Read More...</a>
							</div>
						</div>
	          <!-- Featured Item -->
						<div class="featuredItem">
							<a href="images/content/demo-only/featured-3.jpg" class="featuredImg img zoom" rel="featured"><img src="images/content/mini.png" alt="featured item" /></a>
							<div class="featuredText">
	                            <h1 class="title">iSens Mini<span>For areas less than 20m2</span> </h1>
								<a href="gammes.php">Read More...</a>
							</div>
						</div>
						<!-- Featured Item --><!-- End of Content -->
					  	<div class="clear"></div>
					</div>
					
					<!-- Blog Post -->
					<div class="ribbon">
						<div class="wrapAround"></div>
						<div class="tab"> <span>Les Parfums </span> </div>
  					</div>
					<div class="featuredItem">
						<a href="images/content/demo-only/featured-2.jpg" class="featuredImg img zoom" rel="featured"><img src="images/content/demo-only/featured-2-thumb.jpg" alt="Les Parfums" /></a>
						<div class="featuredText">
                         	<h1 class="title">Design and Signature<span>Because we believe that every customer is unique, we think that he deserves its olfactory signature! Let us know your plans and our staff will be happy to devellop your olfactory identity...</span></h1>
							<a href="parfum.php">Read More...</a>
						</div>
	  			  	</div>				
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

