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

		<div class="contentArea">
			
			<div class="two-thirds">
					<!-- Title / Page Headline -->
					<h1 class="headline"><strong>Summary</strong> &nbsp;//&nbsp;Which iSens suits you...</h1>
					
					<div class="hr"></div>
	
					<!-- Breadcrumbs -->
					<p class="breadcrumbs">
						<a href="{{route('showHome')}}">Home</a> <span>&raquo;</span> <a href="#">Products</a> <span>&raquo;</span> <a href="#">Select your iSens</a> 
					</p>
					
					
					<!-- Content: HOTEL Page -->
					<a name="HOTEL_page"></a>
					<div class="ribbon">
						<div class="wrapAround"></div>
						<div class="tab">
							<span>HOTELS</span>
						</div>
					</div>
					 <h3>For Hotels, every iSens is useful......</h3>					
					 <table cellspacing="0" cellpadding="0" id="FeatureMatrix">
						<tbody>
							<tr>
							  	<td class="matrixItem">Desk</td>
								<td class="matrixEven"><a href="gammes.php#Classic_page"><img src="images/content/classic408.png" width="113" height="23" alt="iSens Classic" /></td>
                                <td class="matrixEven"><a href="gammes.php#HVAC_page"><img src="images/content/hvac408.png" width="113" height="23" alt="iSens HVAC" /></td>
							</tr>
							<tr>
                           		<td class="matrixItem">Corridors</td>
								<td class="matrixEven"><a href="gammes.php#Classic_page"><img src="images/content/classic408.png" width="113" height="23" alt="iSens Classic" /></td>
                            	<td class="matrixEven">&nbsp;</td>
							</tr>
							<tr>
								<td class="matrixItem last">Rooms</td>
								<td class="matrixEven last"><a href="gammes.php#MINI_page"><img src="images/content/mini408.png" alt="iSens Mini" width="113" height="23" align="bottom" /></td>
							<td class="matrixEven last"><a href="gammes.php#MINI_page"><img src="images/content/remote408.png" width="113" height="23" alt="iSens Remote" /></a></td>
                            </tr>
						</tbody>
					</table>
							<p>&nbsp;</p>
					<div class="hr"></div>
               			<!-- Content: SPA Page -->
						<a name="SPA_page"></a>
      					<div class="ribbon">
						<div class="wrapAround"></div>
						<div class="tab">
							<span class="scrollTop"><a href="#Wrapper">Top</a></span>
							<span>SPAS</span>
						</div>
					</div>
                     <h3>For the SPAS also...</h3>                 
                     <table cellspacing="0" cellpadding="0" id="FeatureMatrix">
						<tbody>
							<tr>
							  	<td class="matrixItem">Desk</td>
								<td class="matrixEven"><a href="gammes.php#Classic_page"><img src="images/content/classic408.png" width="113" height="23" alt="iSens Classic" /></td>
                                <td class="matrixEven"><a href="gammes.php#HVAC_page"><img src="images/content/hvac408.png" width="113" height="23" alt="iSens HVAC" /></td>
							</tr>
							<tr>
	                            <td class="matrixItem">Corridors</td>
								<td class="matrixEven"><a href="gammes.php#Classic_page"><img src="images/content/classic408.png" width="113" height="23" alt="iSens Classic" /></td>
	                            <td class="matrixEven"><a href="gammes.php#MINI_page"><img src="images/content/mini408.png" width="113" height="23" alt="iSens Mini" /></td>
							</tr>
                            <tr>
	                            <td class="matrixItem">Treatment room</td>
								<td class="matrixEven"><a href="gammes.php#MINI_page"><img src="images/content/mini408.png" width="113" height="23" alt="iSens Mini" /></td>
	                            <td class="matrixEven">&nbsp;</td>
							</tr>
							<tr>
								<td class="matrixItem last">Relaxion room</td>
								<td class="matrixEven last"><a href="gammes.php#Classic_page"><img src="images/content/classic408.png" alt="iSens Classic" width="113" height="23" align="bottom" /></td>
								<td class="matrixEven last"><a href="gammes.php#MINI_page"><img src="images/content/mini408.png" width="113" height="23" alt="iSens Mini" /></a></td>
                            </tr>
						</tbody>
					</table>
							<p>&nbsp;</p>
               		<div class="hr"></div>
						<!-- Content: MAGASIN Page -->
						<a name="SHOP_page"></a>
      					<div class="ribbon">
						<div class="wrapAround"></div>
						<div class="tab">
							<span class="scrollTop"><a href="#Wrapper">Top</a></span>
							<span>RETAIL</span>
						</div>
					</div>
                    <h3>According to surfaces and equipment...</h3>                    
                    <table cellspacing="0" cellpadding="0" id="FeatureMatrix">
						<tbody>
							<tr>
							  	<td class="matrixItem">Area less than 30 m2</td>
								<td class="matrixEven"><a href="gammes.php#MINI_page"><img src="images/content/mini408.png" width="113" height="23" alt="iSens Mini" /></td>
                               
							</tr>
							<tr>
	                            <td class="matrixItem">Between 30 and 100 m2</td>
								<td class="matrixEven"><a href="gammes.php#Classic_page"><img src="images/content/classic408.png" width="113" height="23" alt="iSens Classic" /></td>
                           
							</tr>
                            <tr>
	                            <td class="matrixItem">Centralized air conditioning</td>
								<td class="matrixEven"><a href="gammes.php#HVAC_page"><img src="images/content/hvac408.png" width="113" height="23" alt="iSens HVAC" /></td>
                            
							</tr>
							<tr>
								<td class="matrixItem last">Changing room</td>
								<td class="matrixEven last"><a href="gammes.php#MINI_page"><img src="images/content/mini408.png" alt="iSens Mini" width="113" height="23" align="bottom" /></td>
							
                            </tr>
						</tbody>
					</table>
							<p>&nbsp;</p>
               		<div class="hr"></div>
						<!-- Content: BUREAUX Page -->
						<a name="OFFIS_page"></a>
      					<div class="ribbon">
						<div class="wrapAround"></div>
						<div class="tab">
							<span class="scrollTop"><a href="#Wrapper">Top</a></span>
							<span>OFFICE</span>
						</div>
					</div>
                    <h3>Selon les surfaces et l'équipement...</h3>              
                    <table cellspacing="0" cellpadding="0" id="FeatureMatrix">
						<tbody>
							<tr>
	                            <td class="matrixItem">Waiting room</td>
								<td class="matrixEven"><a href="gammes.php#Classic_page"><img src="images/content/classic408.png" width="113" height="23" alt="iSens Classic" /></td>
                            </tr>
                            <tr>
	                            <td class="matrixItem">Centralized air conditioning</td>
								<td class="matrixEven"><a href="gammes.php#HVAC_page"><img src="images/content/hvac408.png" width="113" height="23" alt="iSens HVAC" /></td>
                               
							</tr>
							<tr>
								<td class="matrixItem last">Offices</td>
								<td class="matrixEven last"><a href="gammes.php#MINI_page"><img src="images/content/mini408.png" alt="iSens Mini" width="113" height="23" align="bottom" /></td>
                            </tr>
						</tbody>
					</table>
                    	<p>&nbsp;</p>
               		<div class="hr"></div>
               
              <!-- Content: ROOM Page -->
						<a name="ROOM_page"></a>
      					<div class="ribbon">
						<div class="wrapAround"></div>
						<div class="tab">
							<span class="scrollTop"><a href="#Wrapper">Top</a></span>
							<span>HOTEL ROOMS</span>
						</div>
					</div>
                    <h3>For a perfect Welcome...</h3>                    
                    <table cellspacing="0" cellpadding="0" id="FeatureMatrix">
						<tbody>
							<tr>
								<td class="matrixItem last">Entrance</td>
								<td class="matrixEven last"><a href="gammes.php#MINI_page"><img src="images/content/mini408.png" alt="iSens Mini" width="113" height="23" align="bottom" /></td>
							
                            </tr>
						</tbody>
					</table>
                    <p>&nbsp;</p>
               <div class="hr"></div>

 				 <!-- Content: ANIMATION Page -->
						<a name="ANIMA_page"></a>
      					<div class="ribbon">
						<div class="wrapAround"></div>
						<div class="tab">
							<span class="scrollTop"><a href="#Wrapper">Top</a></span>
							<span>ANIMATION AND EVENTS</span>
						</div>
					</div>
                    <h3>According to places...</h3>                    
                    <table cellspacing="0" cellpadding="0" id="FeatureMatrix">
						<tbody>
							<tr>
	                            <td class="matrixItem">Standard area</td>
								<td class="matrixEven"><a href="gammes.php#Classic_page"><img src="images/content/classic408.png" width="113" height="23" alt="iSens Classic" /></td>
                            <tr>
								<td class="matrixItem last">Interactive Animation</td>
								<td class="matrixEven last"><a href="gammes.php#MINI_page"><img src="images/content/mini408.png" alt="iSens Mini" width="113" height="23" align="bottom" /></td>
                            </tr>
						</tbody>
					</table>
                <p>&nbsp;</p>
				
			  </div>			
				
				<div class="one-third">
				
					<!-- Side Navigation Menu -->
					<h1 class="title" style="margin-bottom:0;">Which is your activity...</h1>
					<div class="sideNavWrapper">
						<div class="sideNavBox-1">
							<div class="sideNavBox-2">
								<ul class="sideNav">
									<li><a href="#HOTEL_page">HOTELS</a></li>
									<li><a href="#SPA_page">SPAS</a></li>
	                				<li><a href="#SHOP_page">RETAIL</a></li>
									<li><a href="#OFFIS_page">OFFICE</a></li>
									<li><a href="#ROOM_page">HOTEL ROOM</a></li>						
									<li><a href="#ANIMA_page">ANIMATION AND EVENTS</a></li>
                                </ul>
							</div>
						</div>
					</div>
					
					<!-- Testimonial/Quote --><!-- Newsletter -->
				  <h1 class="title" style="margin-bottom:0;">&nbsp;</h1>
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
