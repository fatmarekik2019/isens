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

<!-- BEGIN PAGE CONTENT -->
<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Synthèse Globale</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<div class="page-content">
		<div class="container-fluid">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
                    <i class="fa fa-home"></i> <a href="index.php">Administration</a> <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Synthèse Globale
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
								<i class="fa fa-cogs"></i>
								<span class="caption-subject font-red-thunderbird bold uppercase">Liste des Diffuseurs</span>
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
						<div class="table-scrollable">
							<table class="table table-striped table-hover table-bordered" id="resume_diffusers_table">
							<thead>
							<tr>
								<th>
									 Nom
								</th>
								<th>
									 Numéro de série
								</th>
								<th>
									 Type
								</th>
                                <th>
                                	Entité facturation
                                </th>
								<th>
									 company_id
								</th>
								<th>
									 Enseigne
								</th>
								<th>
									 reseau_id
								</th>
								<th>
									 Réseau
								</th>
								<th>
									 country_id
								</th>
								<th>
									 Pays
								</th>
								<th>
									 Ville
								</th>
								<th>
									 Adresse
								</th>
								<th>
									 Code postal
								</th>
								<th>
									 user_id
								</th>
								<th>
									 Utilisateur
								</th>
								<th>
									 Couleur
								</th>
                                <th>
                                	etat_1_0
                                </th>
                                <th>
                                	Etat_dlb
                                </th>
                                <th>
                                	Etat_isens
                                </th>
                                <th>
                                	Date Livraison
                                </th>
                                <th>
                                	pump_id
                                </th>
                                <th>
                                	Numéro de Pompe
                                </th>
                                <th>
                                	Type de Pompe
                                </th>
                                <th>
                                	Date de Pompe
                                </th>
                                <th>
                                	Date Anniversaire
                                </th>
                                <th>
                                	Date_Renouv
                                </th>
                                <th>
                                	Avec Parfum
                                </th>
								<th>
									 Editer
								</th>
								<th>
									 Supprimer
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
	<!-- END PAGE CONTENT -->
<!-- END PAGE CONTAINER -->
<script>
 $(document).ready( function () {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  $('#resume_diffusers_table').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ route('diffusersList') }}",
          type: 'GET',
         },
       columns: [
	                { data: 'Name'},
	                { data: 'Num_serie'},
	                { data: 'Type'}
             	]
      });
   });
</script>

@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection