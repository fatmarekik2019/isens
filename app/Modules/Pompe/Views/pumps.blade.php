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
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Synthèse Globale</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->

<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
                    <i class="fa fa-home"></i> <a href="index.php">Administration</a> <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Gestion pompes
                </li>
                <li><i class="fa fa-circle"></i>
                    Table Synthèse
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
								<i class="fas fa-cogs"></i>
								<span class="caption-subject font-red-thunderbird bold uppercase">Synthèse des pompes</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse" data-original-title title></a>
								<a href="javascript:;" class="reload" data-original-title title></a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<a href="new-diffuser.php" class="btn red-thunderbird" role="button" id="sample_editable_1_new">
											Nouveau <i class="fa fa-plus"></i>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div id="resume_diffusers_table_wrapper" class="dataTables_wrapper no-footer">
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="dataTables_length" id="resume_diffusers_table_length">
											<label> 
												<select name="resume_diffusers_table_length" aria-controls="resume_diffusers_table" class="form-control input-xsmall input-inline">
													<option value="5">5</option>
													<option value="15">15</option>
													<option value="20">20</option>
													<option value="-1">Tous</option>
													
												</select>  records 
											</label>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div id="resume_diffusers_table_filter" class="dataTables_filter col-md-offset-8">
											<label> Search : 
												<input type="search" class="form-control input-small input-inline" aria-controls="resume_diffusers_table">
											</label>
										</div>
									</div>
								</div>
								<div class="table-scrollable">
									<table class="table table-striped table-hover table-bordered" id="resume_pumps_table">
										<thead>
										<tr>
											
											<th> Numéro de série</th>
											<th>
												 Type
											</th>
											<th>
												 Date
											</th>
											<th>
												 Fournisseur
											</th>
											
											<th>
												 Etat
											</th>
											<th>
												 Diffuseur
											</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
										</table>
									
								</div>
							</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	</div>
</div>
<script>
$(document).ready( function () {
    $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 $('#resume_pumps_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
         url: "{{ route('pumpsList') }}",
         type: 'GET',
        },
      columns: [
                    
                    { data: 'Num_serie'},
                    { data: 'Type'},
                    { data : 'Date'},
                    { data: 'Fourn'},
                    { data: 'etat.Code',
                     render: $.fn.dataTable.render.text({data: 'etat.Code'})
                }
                ]
     });
 $.fn.dataTable.ext.errMode = 'throw';
  });
</script>
	<!-- END PAGE CONTENT -->
<!-- END PAGE CONTAINER -->

@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection