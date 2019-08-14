<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="{{asset('js/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/jquery.blockui.min.js" type="text/javascript')}}"></script>
<script src="{{asset('js/plugins/jquery.cokie.min.js" type="text/javascript')}}"></script>
<script src="{{asset('js/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/jqvmap/jqvmap/jquery.vmap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="{{asset('js/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('js/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('js/scripts/demo.js')}}" type="text/javascript"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
      jQuery(document).ready(function() {    
         Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features

		$.getJSON("{{asset('map/vmap.php')}}", function(data) {
			$('#vmap').vectorMap({
				map: 'world_en',
				series: {
					regions: [{
						values: data,
						scale: ['#C8EEFF', '#0071A4'],
						normalizeFunction: 'polynomial'
					}]
				},
				onRegionTipShow: function(e, el, code){
					el.html(el.html()+' ('+data[code]+')');
				}
  			});
		});
      });
   </script>
<!-- END JAVASCRIPTS -->