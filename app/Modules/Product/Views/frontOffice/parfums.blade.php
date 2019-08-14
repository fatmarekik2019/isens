@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@endsection

	@section('header')
	    @include('frontOffice.inc.header')
	@endsection


@section('content')

<!-- Site Container -->

<div id="PageWrapper">
<div class="pageMain">

		<!-- Page Content -->
		<div class="contentArea">
			
			<div class="full-page">
					
				<!-- Title / Page Headline -->
				<h1 class="headline"><strong>The Fragrances</strong> &nbsp;//&nbsp;The Lotus Symbol</h1>
					
				<div class="hr"></div>
	
				<!-- Breadcrumbs -->
				<p class="breadcrumbs">
					<a href="{{route('showHome')}}">Home</a> <span>&raquo;</span> <a href="#">Products</a> <span>&raquo;</span> <a href="{{route('showParfums')}}">The Fragrances</a> 
				</p>
					
					<!-- Blog Post -->
				<div class="ribbon">
					<div class="wrapAround"></div>
					<div class="tab">
					<span >The Fragrances</span></div>
				</div>
				
					<img class="img" src="{{asset('images/lotus-2.png')}}" width="888" height="340"/>
					<div class="full-page">
				  		<p>
							<h5 class="headline"> <p style="text-align: justify;"><strong>The lotus flower </strong>is one of the deepest and the oldest symbols of our planet.
							<br>
							<br>
							<strong>Intact in front of the impurity</strong>, the lotus symbolizes the purity of the heart and the spirit. The lotus flower<strong> represents longevity, health, honor and luck.</strong>
							<br>
							<br>
							Named <strong>Sesen</strong> in the Egyptian mythology, The lotus flower  <strong>symbolizes the sun, the creation and the revival</strong>.
							<br>
							It is this flower that symbolizes <strong>our mission; create for you a unique and exclusive olfactory identity. </strong>. 
							<br>
							<ul class="bullet-disc-black">
								<li><strong>As the Lotus </strong>our creations are designed to<strong> reveal perfectly the elegance and the beauty</strong> of your brands and spaces.</li> 
								<li><strong>As the Lotus </strong>Lotus all our creations have in common to <strong> have an irresistible charm and to be unforgettable.</strong>.</li> 
								<li><strong>As the Lotus </strong>our diffusers <strong> let bloom the fragrance the day and closes at night.</strong>.</li> 
							</ul>
							</h5>
          				<p>
		  			
		  		</div>
			</div>
		</div>
<!-- Blog Post --><!-- Blog Post --><!-- End of Content -->
		<div class="clear"></div>					
	</div>
<!-- End of Content -->
		<div class="clear"></div>
</div>
		

@endsection

@section('footer')
	@include('frontOffice.inc.footer')
@endsection

