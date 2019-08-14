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
				<h1>Historique du diffuseur</h1>
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
                    Historique du diffuseur
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
								<i class="fa fa-cogs font-yellow-crusta"></i>
								<span class="caption-subject font-yellow-crusta bold uppercase">Historique du diffuseur</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet yellow-crusta box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Synthèse du diffuseur
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                        	@foreach($diffuser as $list)
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                     Numéro de série:
                                                </div>
                                                <div class="col-md-7 value">
                                                	{{$list->Num_serie}}                                 
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                     Equipement:
                                                </div>
                                                <div class="col-md-7 value">
                                                	<a target="_blank" href="#"> <i class="fa fa-external-link"></i></a>                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                     Nom:
                                                </div>
                                                <div class="col-md-7 value">
                                                     {{$list->Name}}                                         
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                     Type:
                                                </div>
                                                <div class="col-md-7 value">
                                                	{{$list->Type}}                                          
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                     Couleur:
                                                </div>
                                                <div class="col-md-7 value">
                                                	{{$list->Color}}                                        
                                                </div>
                                            </div>
                                                                                        <div class="row static-info">
                                                <div class="col-md-5 name">
                                                     Société:
                                                </div>
                                                <div class="col-md-7 value">
                                                	                                                </div>
                                            </div>
                                                                                        <div class="row static-info">
                                                <div class="col-md-5 name">
                                                     Pays:
                                                </div>
                                                <div class="col-md-7 value">
                                                     <img class='flag' src='../../assets/global/img/flags/fr.png'/> FRANCE / METROPOLITAINE                                                </div>
                                            </div>
                                            <div class="row static-info">
                                            	<div class="col-md-offset-5 no-gutter">
                                                	<div class="col-md-4 tooltips" data-original-title="UTC">
                                                        <div class="col-md-1 name">
                                                             <i class="fa fa-clock-o"></i>
                                                        </div>
                                                        <div class="col-md-3 value">
                                                             +1                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 tooltips" data-original-title="DST">
                                                        <div class="col-md-1 name">
                                                             <i class="fa fa-sun-o"></i>
                                                        </div>
                                                        <div class="col-md-3 value">
                                                             DST                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 tooltips" data-original-title="Hemisphère">
                                                        <div class="col-md-1 name">
                                                             <i class="fa fa-globe tooltips"></i>
                                                        </div>
                                                        <div class="col-md-3 value">
                                                             Nord                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                     Numéro de série pompe:
                                                </div>
                                                <div class="col-md-7 value">
                                                	<a target="_blank" href="#"> <i class="fa fa-external-link"></i></a>
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                     Date pompe:
                                                </div>
                                                <div class="col-md-7 value">
                                                	                                               </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">
                                                     Etat:
                                                </div>
                                                <div class="col-md-7 value">
                                                	<span class="label bg-green-jungle">EN STOCK</span>                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet blue-hoki box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Données Livraison
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                        	                                                <div class="row static-info">
                                                    <div class="col-md-12 value text-center">
                                                        Aucune donnée livraison liée à ce diffuseur
                                                    </div>
                                                </div>
                                                                                    </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="phpVar" value="3795">
							<table class="table table-striped table-hover table-bordered" id="diffuser_history_table">
							<thead>
							<tr>
								<th>
									 Date
								</th>
								<th>
									 Evenement
								</th>
								<th>
									 Nom
								</th>
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