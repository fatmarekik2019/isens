@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head')
@endsection

@section('header')
    @include('backOffice.inc.header')
@endsection

@section('content')

<link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Synthèse Globale</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
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
							<table class="table table-bordered" id="resume_anniversaires_table">
				               <thead>
				                  <tr>
				                     <th>Id</th>
				                     <th>Name</th>
				                     <th>Date_Crea</th>
				                  </tr>
				               </thead>
				               <tbody>
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
	  
<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script>
 $(document).ready( function () {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  $('#resume_anniversaires_table').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ route('anniversairesList') }}",
          type: 'GET',
         },
       columns: [
	                { data: 'Id'},
	                { data: 'Name'},
	                { data: 'Date_Crea'}
             	]  	

      });
   });
</script>
@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection