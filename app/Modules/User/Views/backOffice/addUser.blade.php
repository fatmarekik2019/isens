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
				<h1>Création d'un utilisateur</h1>
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
                <li>
                	<a href="gestion-users.php">Gestion Utilisateurs</a> <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                	Création d'utilisateur
                </li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
                	<div class="portlet light bordered">
                    	<div class="portlet-title">
                        	<div class="caption">
                        		<i class="icon-plus font-blue-steel"></i>
                                <span class="caption-subject font-blue-steel bold uppercase">Nouvel utilisateur</span>
                                <span class="caption-helper">Veuillez saisir les informations du nouvel utilisateur</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
							                            <!-- BEGIN CREATE USER FORM -->
                            <form class="new-user-form form-horizontal form-bordered form-row-stripped" action="new-user.php" method="post">
                                <div class="form-body">
                                    <h4 class="form-section" style="padding: 15px;">Saisir les données / Enter the details :</h4>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nom / Name<span class="required"> * </span></label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input class="form-control" type="text" name="fullname"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email (login)<span class="required"> * </span></label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input class="form-control" type="email" name="email"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">MDP / Password<span class="required"> * </span></label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input class="form-control" type="text" autocomplete="off" name="password"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Fonction / Role<span class="required"> * </span></label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select name="role" class="form-control">
                                                    <option value="">Fonction / Role ...</option>
                                                    <option value="2">Utilisateur / Member</option>
                                                    <option value="3">Réseau / Distributor</option>
                                                    <option value="1">Administrator</option>                
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Société / Company<span class="required"> * </span></label>
                                        <div class="col-md-4">
                                            <div class="input-icon">
                                                <i class="fa"></i>
                                                <select id="company" name="company" class="form-control">

                                                	@foreach($company as $comp)

                                                    <option value="{{$comp->Id}}">{{$comp->Name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Réseau / Network<span class="required"> * </span></label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select id="reseau" name="reseau" class="form-control">

                                                	<option value="">Reseau / Network ...</option>
                                                	@foreach($company as $comp)
                                                	@if($comp->Id == $comp->Reseau_Id)
                                                    <option value="{{$comp->Reseau_Id}}">{{$comp->Name}}</option>
                                                    @endif
                                                    @endforeach
                                                     </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="reset" id="new-user-reset-btn" class="btn btn-default uppercase">Effacer / Reset</button>
                                            <button type="submit" id="new-user-submit-btn" class="btn btn-success uppercase">Enoyer / Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END CREATE USER FORM -->
                            <a href="index.php" role="button" class="btn grey uppercase" name="admin">Retour Admin / Back to Admin</a>
                        </div>
                    </div>
                </div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
    </div>    
@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection