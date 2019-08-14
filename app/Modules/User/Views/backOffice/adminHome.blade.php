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
				<h1>Menu Administrateur</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li class="active">
					<i class="fa fa-home"></i> Administration
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
            	<div id="vmap" class="vmaps"></div>
            </div>
			<div class="row">
				<div class="tiles">
                	<div class="hidden-xs hidden-sm col-md-2 col-md-offset-1">
                        <h3>Synthèse Globale</h3>
                        <div class="tile image">
                            <a href="resume-diffusers.php"><img alt="Synthèse Globale / Global Synthesis" src="../../assets/admin/layout/img/synthesis.png"/></a>
                        </div>
                    </div>
                    <div class="hidden-xs hidden-sm col-sm-2 col-md-2">
                        <h3>Création Diffuseur</h3>
                        <div class="tile image">
                            <a href="new-diffuser.php"><img alt="Ajout de Diffuseur / Add Diffuser" src="../../assets/admin/layout/img/add-diffuser.png"/></a>
                        </div>
                    </div>
                    <div class="hidden-xs hidden-sm col-sm-2 col-md-2">
                        <h3>Gestion Utilisateurs</h3>
                        <div class="tile image">
                            <a href="gestion-users.php"><img alt="Gestion d'Utilisateurs / Manage Users" src="../../assets/admin/layout/img/users.png"/></a>
                        </div>
                    </div>
                    <div class="hidden-xs hidden-sm col-sm-2 col-md-2">
                        <h3>Association Diffuseur</h3>
                        <div class="tile image">
                            <a href="association.php"><img alt="Association" src="../../assets/admin/layout/img/association.png"/></a>
                        </div>
                    </div>
                    <div class="hidden-xs hidden-sm col-sm-2 col-md-2">
                        <h3>Gestion Enseignes</h3>
                                                <div class="tile image">
                            <a href="gestion-companies.php"><img alt="Gestion d'Enseignes / Manage Companies" src="../../assets/admin/layout/img/companies.png"/></a>
                        </div>
                    </div>
                    <div class="tile image visible-xs visible-sm">
                        <a href="resume-diffusers.php"><img alt="Synthèse Globale / Global Synthesis" src="../../assets/admin/layout/img/synthesis.png"/></a>
                    </div>
                    <div class="tile image visible-xs visible-sm">
                        <a href="new-diffuser.php"><img alt="Ajout de Diffuseur / Add Diffuser" src="../../assets/admin/layout/img/add-diffuser.png"/></a>
                    </div>
                    <div class="tile image visible-xs visible-sm">
                        <a href="gestion-users.php"><img alt="Gestion d'Utilisateurs / Manage Users" src="../../assets/admin/layout/img/users.png"/></a>
                    </div>
                    <div class="tile image visible-xs visible-sm">
                        <a href="association.php"><img alt="Association" src="../../assets/admin/layout/img/association.png"/></a>
                    </div>
                    <div class="tile image visible-xs visible-sm">
                        <a href="gestion-companies.php"><img alt="Gestion d'Enseigne / Manage Companies" src="../../assets/admin/layout/img/companies.png"/></a>
                    </div>
                </div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection