<!-- jQuery framework and utilities -->
	<script type="text/javascript" src="{{asset('js/jquery-1.4.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery-ui-1.7.2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.easing.1.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/hoverIntent.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.bgiframe.min.js')}}"></script>
	<!-- Drop down menus -->
	<script type="text/javascript" src="{{asset('js/superfish.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/supersubs.min.js')}}"></script>
	<!-- Tooltips -->
	<script type="text/javascript" src="{{asset('js/jquery.cluetip.min.js')}}"></script>
	<!-- Input labels -->
	<script type="text/javascript" src="{{asset('js/jquery.overlabel.min.js')}}"></script>
	<!-- Anchor tag scrolling effects -->
	<script type="text/javascript" src="{{asset('js/jquery.scrollTo-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.localscroll-min.js')}}"></script>
	<!-- Inline popups/modal windows -->
	<script type="text/javascript" src="{{asset('js/jquery.fancybox-1.2.6.pack.js')}}"></script>		
	<!-- Font replacement (cufón) -->
	<script src="{{asset('js/cufon-yui.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/LiberationSans.font.js')}}" type="text/javascript"></script>
	<script src="{{asset('plugins/toastr/toastr.js') }}" type="text/javascript"></script>
	<script src="{{asset('validator/jquery.validate.js')}}" type="text/javascript"></script>
	<!-- IE only includes (PNG Fix and other things for sucky browsers -->
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="css/ie-only.css">
		<script type="text/javascript" src="js/pngFix.min.js"></script>
		<script type="text/javascript"> 
			$(document).ready(function(){ 
				$(document.body).supersleight();
			}); 
		</script> 
	<![endif]-->
	<!--[if IE]><link rel="stylesheet" type="text/css" href="css/ie-only-all-versions.css"><![endif]-->
	
	
	<!-- BEGIN: For Demo Only -->
		<!--			
		These entries are only needed for demo features, such as the real-time skin changer.
		They can be deleted for production installs without effecting the theme's design or 
		any of the funcionality.
		-->
		<!--<script type="text/javascript" src="js/demo.js"></script>-->	
		
	<!-- END: For Demo Only -->
	<!-- Slide shows -->
		<!-- Cycle 	(default) -->
		<script type="text/javascript" src="{{asset('js/jquery.cycle.all.min.js')}}"></script>
		<script type="text/javascript">
			// initialize slideshow (Cycle)
			var firstCycle = true;
			$(document).ready(function($) {
				if ($('#Slides').length > 0) {
					$('#Slides').cycle({ 
						fx: 'scrollHorz',
						speed: 750,
						timeout: 6000, 
						randomizeEffects: false, 
						easing: 'easeOutCubic',
						next:   '.slideNext', 
						prev:   '.slidePrev',
						pager:  '#slidePager',
						cleartypeNoBg: true,
						after: function(curr, next, opts) {
							// reset the overlay for the next slide
							jQuery('#SlideRepeat').css('cursor','default').unbind('click');
							// get the link and apply it to the overlay
							toGet = (firstCycle) ?  $('#Slides').children(':eq(0)') : next;
							var linkURL = jQuery(toGet).attr('href') || jQuery(toGet).children('a').attr('href') || false;
							if (linkURL) {
								jQuery('#SlideRepeat').css('cursor','pointer').click( function() {
									document.location.href = linkURL;
								});
							} 
							firstCycle = false;
						}
					});
				}
			});
		</script>

<!-- Functions to initialize after page load -->
	<script type="text/javascript" src="{{asset('js/source/onLoad.js')}}"></script>
	
	<!-- form validation scripts (for contact page) -->
	<script src="{{asset('js/jquery.validate.min.js')}}" type="text/javascript"></script>
	
	<!-- Contact form triggers and AJAX submit -->
	<script src="{{asset('js/contactForm.js')}}" type="text/javascript"></script>

	
	






	