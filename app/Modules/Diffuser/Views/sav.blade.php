@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head')
@endsection

@section('header')
    @include('backOffice.inc.header')
@endsection

@section('content')

<!-- BEGIN PAGE CONTENT -->
<div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>S.A.V</h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
    </div>
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<i class="fa fa-home"></i><a href="index.php">Administration</a> <i class="fa fa-circle"></i>
				</li>
                <li class="active">
                	S.A.V
                </li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
                	<div  class="portlet light bordered">
                    	<div class="portlet-title">
                        	<div class="caption">
                            	                                    <i class="fa fa-wrench font-yellow-casablanca"></i>
                                    <span class="caption-subject font-yellow-casablanca bold uppercase">S.A.V</span>
                                                            </div>
                        </div>
                        <div class="portlet-body form">
							                            <!-- BEGIN SAV FORM -->
                            <form id="diff-sav-form" class="form-horizontal form-bordered form-row-stripped" action="sav.php" method="post">
                                <h4 class="form-section">Sélectionnez le diffuseur à analyser</h4>
                                <div class="form-body">
									                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Type d'opération</label>
                                        <div class="col-md-9">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                <input type="radio" name="ope" id="sav" value="sav" checked> Déclarer un S.A.V </label>
                                                <label class="radio-inline">
                                                <input type="radio" name="ope" id="analyse" value="analyse"> Analyser un diffuseur <span class="badge badge-danger">28</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Diffuseur</label>
                                        <div class="col-md-4 div-sav">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select name="diffuserSav" class="select2 withsearch form-control">
                                                    @foreach($diffusers as $diffuser)
                                                    <option value="{{$diffuser->Id}}">{{$diffuser->Name}}</option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 div-analyse hidden">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select name="diffuserAnalyse" class="select2 withsearch form-control">
                                                    @foreach($diffusers as $diffuser)
                                                    <option value="{{$diffuser->Id}}">{{$diffuser->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                 <div class="col-md-offset-3 col-md-9">
                                                    <button class="btn yellow-casablanca" type="submit">Envoyer / Submit</button>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END SAV FORM -->
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
<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript" ></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/bootbox/bootbox.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/select2/select2.min.js')}}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{asset('assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/layout/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/layout/scripts/demo.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/pages/scripts/sav.js')}}" type="text/javascript"></script>
<script>
      jQuery(document).ready(function() {    
         Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
Sav.init();
      });
   </script>
    @endsection

@section('footer')
    @include('backOffice.inc.footer')
@endsection