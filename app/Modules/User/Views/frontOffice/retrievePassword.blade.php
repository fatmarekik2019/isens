@extends('frontOffice.layout')

@section('head')
    @include('frontOffice.inc.head')
@endsection

@section('header')
    @include('frontOffice.inc.header')
@endsection

@section('content')

{!! Toastr::render() !!}
<div id="PageWrapper">
<div class="pageMain">
		<!-- Page Content -->
		<div class="contentArea">
			<!-- Title / Page Headline -->
			<div class="full-page">
				<h1 class="headline"><strong> Mot de passe perdu ?</strong> &nbsp;//&nbsp; Un mot de passe vous sera envoyé...</h1>
			</div>
			
			<div class="hr"></div>

			<!-- Breadcrumbs -->
			<div class="full-page">
				<p class="breadcrumbs">
				<a href="index.php">Accueil</a> <span>&raquo;</span> <a href="#">Nouveau mot de passe</a></p>
			</div>
			
			<!-- End of Content -->
			<div class="clear"></div>
		</div>
		<div class="contentArea">
			<h2 class="narrow">Vous allez recevoir votre nouveau mot de passe par Email</h2>
				<form name="form" autocomplete="off" enctype="multipart/form-data" method="post" action="{{route('handleLostPassword')}}" class="narrow clear-fix">
				@csrf			
				<fieldset>
					<div>
						<label class="overlabel" for="email">adresse email</label>
						<input type="email" class="textInput required" name="email" id="email" />
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
