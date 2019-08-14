@guest
<div id="ContentPanel">
	<!-- close button -->
	<a href="#" class="topReveal closeBtn">Close</a>
	<div class="contentArea">
		<!-- New member registration -->
		<div class="right" style="margin:10px 0 0;">
			<h1>
				Not a member yet? <span> register now and get started. </span></h1>
			<a href="{{route('showRegister')}}"><button type="button">Register for an account</button></a>
		</div>
		<!-- Alternate Login -->				
		<div>
			<form class="loginForm" method="post" action="{{route('handleUserLogin')}}" style="height:auto;">
				@csrf
				<div id="loginBg"><img src="{{asset('images/icons/lock-and-key-110.png')}}" width="110" height="110" alt="lock and key" /></div>
				<h2 style="margin-top: 20px;">Sign in to your account.</h2>
				<fieldset>
					<legend>Account Login</legend>
					<p class="left" style="margin: 0 8px 0 0;">
						<label for="RevealUsername" class="overlabel">Email</label>
						<input id="RevealUsername" name="email" type="text" class="loginInput textInput rounded" />
					</p>
					<p class="left" style="margin: 0 5px 0 0;">
						<label for="RevealPassword" class="overlabel">Password</label>
						<input id="RevealPassword" name="password" type="password" class="loginInput textInput rounded" />
					</p>
					<p class="left" style="margin: -7px 0 0;">
						<button type="submit" class="btn" style="margin:0;"><span>Sign in</span></button>
					</p>
				</fieldset>
				<p class="left noMargin">
					<a href="{{route('handleLostPassword')}}">Forgot your Password ?</a>
				</p>
			</form>		
		</div>
        
		<!-- End of Content -->
		<div class="clear"></div>	
	</div>
</div>
@endauth
<div id="PageWrapperHeader">
	<div class="pageTop"></div>
  	<div id="Header">
		<!-- Main Menu -->
		<div id="MenuWrapper">
			<div id="MainMenu">
				<div id="MmLeft"></div>
				<div id="MmBody">
					<!-- Main Menu Links -->
					<ul class="sf-menu">
						<li class="current"><a href="{{route('showHome')}}">@lang('pagination.home')</a></li>
						<li><a href="#">@lang('pagination.product')</a>
						<ul>
							<li><a href="{{route('showGammes')}}">@lang('pagination.iSensRange')</a></li>
        					<li><a href="{{route('showUnivers')}}">@lang('pagination.iSensbyBusiness')</a></li>
        					<li><a href="{{route('showSynthese')}}">@lang('pagination.selectyourisens')</a></li>
       						<li><a href="{{route('showParfums')}}">@lang('pagination.fragrance')</a></li>
   						</ul>
    					<li><a href="#">@lang('pagination.references')</a></li>     
						<li><a href="{{route('showFaq')}}">@lang('pagination.FAQ')</a></li>
   						 <li><a href="#">@lang('pagination.contact')</a></li>
					</ul>
					<div class="mmDivider"></div>							
					<!-- Extra Menu Links -->
					<ul id="MmOtherLinks" class="sf-menu">
						<li><a href="#"><span class="mmlanguage">@lang('pagination.language')</span></a>
						<ul>
							<li><a href="{{route('changeLanguage', ['lang'=>'en'])}}">@lang('pagination.English')</a></li>
							<li><a href="{{route('changeLanguage', ['lang'=>'fr'])}}">@lang('pagination.Frensh')</a></li>
							<li><a href="{{route('changeLanguage', ['lang'=>'esp'])}}">@lang('pagination.Spanish')</a></li>
			       		</ul>
					   @auth
			<li class="last"><a href="#">@lang('pagination.account')</a>
		         <ul>
		                       <li><a href="{{route('handleChangePassword')}}">@lang('pagination.changePassWord')</a></li>                           
		                       <li><a href="program.php">@lang('pagination.scheduling')</a></li>
		                       <li><a href="{{route('handleLogout')}}">@lang('pagination.logout')</a></li>
		                      
		                       <li><a href="{{route('showAdminHome')}}">@lang('pagination.administration')</a></li>
		         </ul>
		    </li>
		   @endauth
		   @guest
		    <li><a href="#ContentPanel" class="topReveal"><span class="mmLogin">@lang('pagination.login')</a></li>
		    @endauth
                    </ul>
       			</div>
				<div id="MmRight"></div>
			</div>
		</div>
		<!-- Logo -->
		<div id="Logo">
			<a href="{{route('showHome')}}"></a>
		</div>
		
		<!-- End of Content -->
		<div class="clear">
			@if ($errors->any())
           	<div class="alert alert-danger">
               <ul>
				@foreach ($errors->all() as $error)
	            	<li>{{$error}}</li>
	        	@endforeach
	     		</ul>
           	</div>
        	@endif
		</div>
	</div>
	<!-- Toastr -->
	<script src="http://code.jquery.com/jquery-2.0.3.min.js" ></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>	
</div>



		