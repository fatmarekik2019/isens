@extends('backOffice.layout')

@section('head')
    @include('backOffice.inc.head')
@endsection

@section('header')
    @include('backOffice.inc.header')
@endsection

@section('content')
 <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Accueil > </a></li><li class="active">Gestion Diffuseur</li>        
        </ul>
<div class="col-md-12 col-sm-12">
            <h1>Votre compte / Your Account</h1>
            <div class="content-page">
            	<ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab">
                        <b>Vos informations / Your Details</b> </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="row margin-bottom-20">
                        <div class="col-md-2">
                            <div class="ratio img-responsive img-circle" style="background-image: url('{{asset('images/no-avatar.png')}}'); border: 4px solid #F0F0F0;"></div>
                        </div>
                        <div class="col-md-10 profile-info">
                            <h2>Bienvenue / Welcome : {{Session::get('admin')['name']}}</h2>
                            <ul class="list-inline">
                                <li class="col-sm-6">
                                    <i class="fa fa-envelope"></i> <b> Email :</b> {{Session::get('admin')['email']}}
                                </li>
                                <li class="col-sm-6">
                                    <i class="fa fa-briefcase"></i> <b>Société / Company :</b> {{Session::get('admin')['company']}}
                                </li>
                                <li class="col-sm-6">
                                    <i class="fa fa-globe"></i><b> Pays / Country :</b> {{Session::get('admin')['country']}}
                                </li>
                                <li class="col-sm-6">
                                    <i class="fa fa-building"></i> <b>Ville / City :</b> {{Session::get('admin')['city']}}
                                </li>
                                <li class="col-sm-12">
                                    <i class="fa fa-info-circle"></i> <b>Créé le / Created the :</b>
                                    {{ date('d M Y' , strtotime(Session::get('admin')['date_registered'])) }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab">
                            <b>Gestion diffuseurs / Diffuser Managment</b> </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tiles">
                        <div class="hidden-xs hidden-sm col-sm-3 col-md-6">
                            <h4><b>Liste diffuseurs / Diffuser List</b></h4>
                            <div class="tile image">
                                <a href="manage.php"><img alt="Liste de mes diffuseurs" src="../../assets/frontend/pages/img/list-diff.png"/></a>
                            </div>
                        </div>
                        <div class="hidden-xs hidden-sm col-sm-3 col-md-6">
                            <h4><b>Fichier carte SD - SD File Access</b></h4>
                            <div class="tile image">
                                <a href="javascript:;"><img id="sd" alt="Fichier carte SD" src="../../assets/frontend/pages/img/sd.png"/></a>
                            </div>
                        </div>
                        <div class="tile image visible-xs visible-sm">
                            <a href="manage.php"><img alt="Liste de mes diffuseurs" src="../../assets/frontend/pages/img/list-diff.png"/></a>
                        </div>
                        <div class="tile image visible-xs visible-sm">
                            <a href="javascript:;"><img id="sd" alt="Fichier carte SD" src="../../assets/frontend/pages/img/sd.png"/></a>
                        </div>
                    </div>
                    <form id="uploadsd" method="post" action="upload.php" enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="6097152">
                        <input type="file" id="sdfile" name="sdfile" class="hidden">
                    </form>
                </div>
            </div>   
            <!-- END RECENT WORKS -->
          </div>
        </div>
    </div>
          <!-- END CONTENT -->
        @endsection
<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="{{asset('js/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/global/scripts/metronic.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('js/frontend/pages/scripts/upload.js')}}"></script>    
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initNavScrolling();
            Upload.init();
        });
    </script>
@section('footer')
    @include('backOffice.inc.footer')
@endsection