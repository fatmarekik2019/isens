@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head')
@endsection

@section('header')
    @include('backOffice.inc.header')
@endsection

@section('content')

<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Synthèse des utilisateurs</h1>
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
                <li>
                    <a href="gestion-users.php">Gestion utilisateurs</a> <i class="fa fa-circle"></i>
                </li>
                <li class="active">
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
								<i class="fa fa-users font-blue"></i>
								<span class="caption-subject font-blue bold uppercase">Liste des Utilisateurs</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<a href="new-user.php" class="btn blue" role="button" id="sample_editable_1_new">
											Nouveau <i class="fa fa-plus"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="resume_users_table">
							<thead>
							<tr>
								
								<th>
									 Nom
								</th>
								<th>
									 Email
								</th>
								
								<th>
									 Société
								</th>
								
								<th>
									 Réseau
								</th>
								
								<th>
									 Groupe
								</th>
								<th>
									 Date de création
								</th>
								<th>
									 Dernière connexion
								</th>
								<th>
									 Renvoyez les identifants
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
								@foreach($users as $user)
										<tr>
											<td>{{$user->display_name}}</td>
											<td>{{$user->email}}</td>
											
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
<!-- END PAGE CONTAINER -->

<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->


@endsection
@section('footer')
    @include('backOffice.inc.footer')
@endsection