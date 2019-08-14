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
					<h1 class="headline"><strong>iSens Range</strong> &nbsp;//&nbsp;What is your world ...</h1>
					<div class="hr"></div>
	
					<!-- Breadcrumbs -->
					<p class="breadcrumbs">
					<a href="{{route('showHome')}}">Home</a> <span>&raquo;</span> <a href="#">Products</a> <span>&raquo;</span> <a href="{{route('showUnivers')}}">iSens by Worlds</a> 
					
					<!-- Blog Post -->
					<div class="ribbon">
						<div class="wrapAround"></div>
						<div class="tab">
							<span >iSens by Worlds</span>
						</div>
					</div>
                    <h1>One or Various iSens for every World </h1>
					<!-- Gallery/Portfolio -->
					<div class="portfolio">
						<div class="portfolio-item">
							<a href="images/content/Spa_piscine_interieur.jpg" class="zoom img" title="SPA La Mamounia" rel="portfolio">
								<img src="images/content/Spa_piscine_sample.jpg" class="portfolio-image" alt="SPA La Mamounia" />
							</a>
							<div class="portfolio-description">
								<h4>The SPAS</h4>
								<p>A space where relaxation and silence are the key words...</p>
								<a href="synthese.php#SPA_page">More info</a>
						  	</div>
						</div>
						<div class="portfolio-item">
							<a href="images/content/Hotel_interior.jpg" class="zoom img" title="Hotel Burgundy" rel="portfolio">
								<img src="images/content/Hotel_Sample.jpg" class="portfolio-image" alt="Hotel Burgundy" />
							</a>
						  <div class="portfolio-description">
								<h4>The HOTELS</h4>
								<p>Unique places where the first sensation is the strongest...</p>
								<a href="synthese.php#HOTEL_page">More info</a>
						  	</div>
			      		</div>
						<div class="portfolio-item">
							<a href="images/content/Boss_Champs.jpg" class="zoom img" title="BOSS Champs Elysées" rel="portfolio">
								<img src="images/content/Boss_Sample.jpg" class="portfolio-image" alt="BOSS Champs Elysées" />
							</a>
					  	  <div class="portfolio-description">
								<h4>The SHOPS</h4>
								<p>One brand, one universe, a story, a moment of pleasure ...</p>
								<a href="synthese.php#SHOP_page">More info</a>
						  	</div>
						</div>
						<div class="portfolio-item">
							<a href="images/content/Office_CGPME.jpg" class="zoom img" title="Bureaux CGPME" rel="portfolio">
								<img src="images/content/Office_Sample.jpg" class="portfolio-image" alt="Bureaux CGPME" />
							</a>
							<div class="portfolio-description">
							 	<h4>The OFFICES</h4>
								<p>Welcome your visitors differently...</p>
								<a href="synthese.php#OFFIS_page">More info</a>
						  	</div>
					  	</div>
			  			<div class="portfolio-item">
							<a href="images/content/Hotel-Room_Academies.jpg" class="zoom img" title="Chambre Académies et des Arts" rel="portfolio">
								<img src="images/content/Hotel-Room_sample.jpg" class="portfolio-image" alt="Chambre Académies et des Arts" />
							</a>
							<div class="portfolio-description">
					<h4>The SMALL AREAS</h4>
					<p>A shell of intimacy ...</p>
					<a href="synthese.php#ROOM_page">More info</a>
						  
						  </div>
					  </div>
						<div class="portfolio-item">
							<a href="images/content/Animation_Hollywood.jpg" class="zoom img" title="Animation Hollywood" rel="portfolio">
								<img src="images/content/Animation_Sample.jpg" class="portfolio-image" alt="Animation Hollywood" />
							</a>
							<div class="portfolio-description">
								<h4>The ANNIMATIONS</h4>
								<p>Create a surprise...</p>
								<a href="synthese.php#ANIMA_page">More info</a>
						  	</div>
						</div>
						
					</div>
					
					<!-- End of Content -->
					<div class="clear"></div>
					
				</div>
					<!-- Blog Post --><!-- Blog Post --><!-- End of Content -->
			  <div class="clear"></div>
										
		  </div>

				<!-- End of Content -->
			  <div class="clear"></div>
				




@endsection

@section('footer')
	@include('frontOffice.inc.footer')
@endsection

