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
				<h1>Création d'une enseigne</h1>
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
                    <a href="gestion-companies.php">Gestion Enseignes</a> <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Création d'une enseigne
                </li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
                	<div id="form_wizard_company" class="portlet light">
                    	<div class="portlet-title">
                        	<div class="caption">
                                <span class="caption-subject font-yellow-crusta bold uppercase">
                                    <i class="icon-plus"></i> Nouvelle enseigne - 
                                </span>
                                <span class="step-title">Etape 1 sur 4</span>
                                <span class="caption-helper">Suivez les étapes de création ...</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
						                            <!-- BEGIN REGISTRATION FORM -->
                            <form id="new-company-form" class="form-horizontal" action="new-company.php" method="post">
                                <div class="form-wizard">
                                    <div class="form-body">
                                        <ul class="nav nav-pills nav-justified steps">
                                            <li>
                                                <a href="#tab1" data-toggle="tab" class="step"><span class="number">1</span><span class="desc"><i class="fa fa-check"></i> Enseigne</span></a>
                                            </li>
                                            <li>
                                                <a href="#tab2" data-toggle="tab" class="step"><span class="number">2</span><span class="desc"><i class="fa fa-check"></i> Réseau</span></a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab" class="step"><span class="number">3</span><span class="desc"><i class="fa fa-check"></i> Rattachement</span></a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab" class="step"><span class="number">4</span><span class="desc"><i class="fa fa-check"></i> Récapitulatif</span></a>
                                            </li>
                                        </ul>
                                        <div id="bar" class="progress progress-striped" role="progressbar">
                                            <div class="progress-bar progress-bar-success"></div>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <h3 class="block">Nom de la nouvelle enseigne</h3>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Saisir le nom de la nouvelle enseigne<span class="required"> * </span></label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input class="form-control placeholder-no-fix" type="text" name="company_name"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab2">
                                                <h3 class="block">Souhaitez-vous aussi créer un réseau ?</h3>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Choisissez <span class="required">*</span></label>
                                                    <div class="col-md-4">
                                                        <input name="create" type="checkbox" class="make-switch switch-on" data-size="large" data-on-text="Oui" data-off-text="Non">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab3">
                                                <h3 class="block">Liaison à un réseau</h3>
                                                <div class="hidden div-input-reseau form-group">
                                                    <label class="control-label col-md-3">Saisir le nom du réseau<span class="required"> * </span></label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input class="form-control placeholder-no-fix" type="text" name="reseau_name"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="div-select-reseau form-group">
                                                    <label class="control-label col-md-3">Sélectionnez un réseau<span class="required"> * </span></label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control" name="reseau_id" id="reseau_list">
                                                            <option value="271">VILA HERMANOS</option>                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab4">
                                                <h3 class="block">Récapitulatif</h3>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nom de la nouvelle enseigne</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="company_name"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Création d'un nouveau réseau</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="create"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group div-input-reseau hidden">
                                                    <label class="control-label col-md-3">Création et liaison au réseau</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="reseau_name"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group div-select-reseau">
                                                    <label class="control-label col-md-3">Liée au réseau</label>
                                                    <div class="col-md-4">
                                                        <p class="form-control-static" data-display="reseau_id"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <a href="javascript:;" class="btn default button-previous">
                                                <i class="m-icon-swapleft"></i> Précédent / Back </a>
                                                <a href="javascript:;" class="btn yellow-crusta button-next">
                                                Suivant / Continue <i class="m-icon-swapright m-icon-white"></i>
                                                </a>
                                                <button type="submit" class="btn green button-submit">
                                                Envoyer / Submit <i class="m-icon-swapright m-icon-white"></i>
                                                </button>
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
<script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('assets/global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS --><!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/select2/select2.min.js')}}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{asset('assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/layout/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/layout/scripts/demo.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/pages/scripts/new-company.js')}}" type="text/javascript"></script>
<script>
      jQuery(document).ready(function() {    
         Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
NewCompany.init();
      });
   </script>
@endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection