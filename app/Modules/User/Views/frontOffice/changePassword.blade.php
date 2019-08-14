@extends('frontOffice.layout')

@section('head')
   @include('frontOffice.inc.head')
@endsection

@section('header')
   @include('frontOffice.inc.header')
@endsection

@section('content')
    <div id="PageWrapper">  
        <div class="pageMain">

            <!-- Page Content -->
            <div class="contentArea">
                <!-- Title / Page Headline -->
                <div class="full-page">
                    <h1 class="headline"><strong>Changez le Mot de passe</strong> &nbsp;//&nbsp; Et accédez à la programmation...</h1>
                </div>
                
                <div class="hr"></div>

                <!-- Breadcrumbs -->
                <div class="full-page">
                    <p class="breadcrumbs">
                    <a href="index.php">Accueil</a> <span>&raquo;</span> <a href="#">Changer le mot de passe</a></p>
                </div>
                
                <!-- End of Content -->
                <div class="clear"></div>
            </div>
            <div class="contentArea">
                <form name="form" autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('handleChangePassword')}}" class="narrow clear-fix">
                @csrf      
                    <fieldset>
                        <h2 class="narrow">Actual Password</h2>
                        <div>
                            <label class="overlabel" for="old_password">Actual password</label>
                            <input type="password" class="textInput" name="old_password" id="old_password" />
                        </div>
                        <h2 class="narrow">Change Password</h2>
                        <div>
                            <label class="overlabel" for="new_password_1">New password</label>
                            <input type="password" class="textInput" name="new_password_1" id="new_password_1" />
                        </div>
                        <div>
                            <label class="overlabel" for="new_password_2">Confirm new password</label>
                            <input type="password" class="textInput" name="new_password_2" id="new_password_2" />
                        </div>
                        <div id="buttons">
                            <input type="submit" class="btn" value="Valider"/>
                        </div>
                    </fieldset>
                </form>     
                <!-- End of Content -->
                <div class="clear"></div>
            </div>
            <!-- End of Content -->
            <div class="clear"></div>
        </div>
    </div>
@endsection

@section('footer')
    @include('frontOffice.inc.footer')
@endsection