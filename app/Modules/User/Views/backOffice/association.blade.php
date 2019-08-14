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
				<h1>Association</h1>
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
					<i class="fa fa-home"></i><a href="index.php">Administration</a> <i class="fa fa-circle"></i>
				</li>
                <li>
                	<a href="gestion-users.php">Gestion Utilisateurs</a> <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                	Association
                </li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
                	<div class="portlet light bordered">
                    	<div class="portlet-title">
                        	<div class="caption">
                                <i class="fa fa-link font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Association d'un diffuseur à un utilisateur</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
						                            <!-- BEGIN ASSOCIATION FORM -->
                            <form class="association-form form-horizontal form-bordered form-row-stripped" action="association.php" method="post">
                                <h4 class="form-section">Sélectionnez le diffuseur et l'utilisateur à associer</h4>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Diffuseur</label>
                                        <div class="col-md-9">
                                            <select name="diffuser" id="select2_diffuser" class="select2 form-control">
                                                <option value="">Sélectionnez / Select ...</option>
                                                
                                                 @foreach($diffusers as $diffuser)
                                              <option value="{{$diffuser->Id}}">{{$diffuser->Name}}</option>
                                             @endforeach 
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    	<label class="col-md-3"></label>
                                        <div class="col-md-9">
                                            <i class="col-md-offset-3 glyphicon glyphicon-sort"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Utilisateur</label>
                                        <div class="col-md-9">
                                            <select name="user" id="select2_user" class="select2 form-control">
                                                <option value="">Sélectionnez / Select ...</option>
                                                
                                                 @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->display_name}}</option>
                                                 @endforeach 
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                 <div class="col-md-offset-3 col-md-9">
                                                    <button class="btn green" type="submit">Envoyer / Submit</button>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END REGISTRATION FORM -->
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
<!-- END PAGE CONTAINER -->
@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection