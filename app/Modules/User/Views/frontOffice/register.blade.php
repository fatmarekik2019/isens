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
			<h1 class="headline"><strong>Register</strong> &nbsp;//&nbsp; And Acces to the Scheduling...</h1>
		</div>
		<div class="hr"></div>
		<!-- Breadcrumbs -->
		<div class="full-page">
			<p class="breadcrumbs">
			<a href="index.php">Home</a> <span>&raquo;</span> <a href="#">Registration</a> </p>
		</div>
		<!-- End of Content -->
		<div class="clear"></div>
	</div>

	<div class="contentArea">
	<!-- Contact form -->
		<div class="contentArea">
			<!-- Contact form -->
	        <h1 class="title">
				Registration Form.
				<span>Fill out the form below to register. Thank you.</span>
			</h1>
			<p style="text-align: justify;">To learn how to register and schedule your iSens, you can find help in the note below.<br></p>
			<a href="PDF/PROGRAMMATION WEB_EN.pdf" class="img.left"><img src="{{asset('images/acrobat.gif')}}" alt="Acrobat" width="49" height="44" /></a>
			<p style="text-align: justify; class="breadcrumbs">Register and Schedule.</p>
			<br/><br/>
			<div id="Note"></div>					
			<form class="cmxform" id="RegisterForm" autocomplete="off" name="form" action="{{route('handleCreateUser')}}" method="post">
				@csrf
				<div class="half-page">
					<fieldset>
						<div>
							<label for="display_name" class="overlabel">Utilisateur/ User</label>
							<input id="display_name" name="display_name" class="textInput required" />
						</div>
						<div>
							<label for="email" class="overlabel">E-Mail</label>
							<input id="email" name="email" class="textInput required email" />
						</div>
						<div>
							<label for="Enseigne" class="overlabel">Enseigne/ Brand</label>
							<input id="Enseigne" name="Enseigne" class="textInput required" />
						</div>
						<div>
							<label for="Country" class="overlabel">Pays/ Country</label>
							<input id="Country" name="Country" class="textInput" />
							<!--<select name="Country">
																</select>-->
							
						</div>
						<div id="buttons">
				         	<input type="submit" class="btn" value="Valider / Validate"/>
				         </div>
					</fieldset>
				</div>
				<div class="half-page">
					<fieldset>
						<div>
							<label for="password" class="overlabel">Mot de Passe/ Password</label>
							<input type="password" id="password" name="password" class="textInput required" rows="10" cols="4"/>
						</div>
						<div>
							<label for="password2" class="overlabel">Confirmer Mot de Passe/ Confirm Password</label>
							<input type="password" id="password2" name="password2" class="textInput required" rows="10" cols="4"/>
						</div>
						<div>
							<label for="Serial" class="overlabel">N° De Série/ Serial Number</label>
							<input id="Serial" name="Serial" class="textInput required" />
						</div>
						<div>
							<label for="City" class="overlabel">Ville/ City </label>
							<input id="City" name="City" class="textInput" />
						</div>
						<div>
								@if(Session::has('language'))
								<input type="text" name="language" value="{{Session::get('language')}}"hidden>
								@else
								<input type="text" name="language" value="en" hidden>
           						@endif
						</div>

					</fieldset>
				</div>
			</form>
			<!-- End of Content -->
			<div class="clear"></div>
		</div>
		<!-- End of Content -->
		<div class="clear"></div>
		<script type="text/javascript" src="{{asset('js/confirm_password.js')}}"></script>
	</div>
</div>
</div>
@endsection

@section('footer')
	@include('frontOffice.inc.footer')
@endsection
