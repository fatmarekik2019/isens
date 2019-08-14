@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head')
@endsection

@section('header')
    @include('backOffice.inc.header')
@endsection

@section('content')

<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Commandes en attente</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
            	<li>
                    <i class="fa fa-home"></i> <a href="index.php">Administration</a> <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Commandes en attente
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
								<i class="fa fa-clock-o font-purple"></i>
								<span class="caption-subject font-purple bold uppercase">Liste des Commandes en attente</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-hover table-bordered" id="resume_attentes_table">
							<thead>
								<tr>
									<th> Réf.</th>
									<th> Réf. commande client </th>
									<th> Société </th>
									<th> Date commande </th>
									<th> Date livraison éstimée </th>
									<th> Produit </th>
									<th> Quantité </th>
									<th> Solde </th>
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
<!-- END PAGE CONTAINER -->
@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection