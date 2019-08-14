@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head')
@endsection

@section('header')
    @include('backOffice.inc.header')
@endsection

@section('content')
<link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/select2/select2.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Synthèse des anniversaires</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container-fluid">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
                    <i class="fa fa-home"></i> <a href="index.php">Administration</a> <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Synthèse Anniversaires
                </li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bell font-green-turquoise"></i>
								<span class="caption-subject font-green-turquoise bold uppercase">Liste des anniversaires</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-hover table-bordered" id="resume_anniversaires_table">
							<thead>
							<tr>
								<th>
									 Nom
								</th>
								<th>
									 Société
								</th>
								<th>
									 Livraison
								</th>
								<th>
									 BL
								</th>
								<th>
									 Anniversaire
								</th>
								<th>
									 Renouvellement
								</th>
								<th>
									 Diffuseurs
								</th>
								<th>
									 parfum_id
								</th>
								<th>
									 Parfum
								</th>
								<th>
									 Annuités
								</th>
								<th>
									 Recharge
								</th>
								<th>
									 Estimation conso.
								</th>
								<th>
									 Historique conso.
								</th>
								<th>
									 Renvoi urgence
								</th>
							</tr>
							
							</thead>
							<tbody>
								@foreach($anniversaires as $anniversaire)
								<tr>
									<td>{{$anniversaire->Name}}</td>
									<td>{{$anniversaire->company['Name']}}</td>
									<td>{{$anniversaire->Date_Crea}}</td>
									<td>{{$anniversaire->Name}}</td>
								</tr>
								@endforeach
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT -->

		</div>
	</div>
	<!-- END PAGE CONTENT -->
	</div>
	  @endsection
<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
	<script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript')}}"></script>
	<script type="text/javascript" src="{{asset('assets/global/plugins/bootbox/bootbox.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/global/plugins/select2/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/global/plugins/datatables/plugins/sorting/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/global/plugins/datatables/plugins/sorting/datetime-moment.js')}}"></script>  

    <script src="{{asset('assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/admin/layout/scripts/layout.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/admin/layout/scripts/demo.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/admin/pages/scripts/resume-anniversaires.js')}}"></script>
	<script>
	jQuery(document).ready(function() {       
	   Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	   ResumeAnniversaires.init();
	});
	jQuery(document).ajaxComplete(function(){
		Metronic.initAjax();
	  });
    </script>
@section('footer')
    @include('backOffice.inc.footer')
@endsection