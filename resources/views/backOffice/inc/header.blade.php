<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="{{route('showAdminHome')}}"><img src="{{asset('images/LOGO-ISENS-2014.png')}}" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="avatar" class="img-circle" src="{{asset('images/no-avatar.png')}}">
						<span class="username username-hide-mobile">{{Session::get('admin')['name']}}</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="{{route('showAccount')}}">
								<i class="fa fa-user"></i> My Profile </a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="../frontend/logout.php">
								<i class="fa fa-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
	</div>
	<!-- END HEADER TOP -->
	<!-- BEGIN HEADER MENU -->
	<div class="page-header-menu">
		<div class="container">
			<!-- BEGIN MEGA MENU -->
			<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
			<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
			<div class="hor-menu ">
				<ul class="nav navbar-nav">
					<li>
						<a href="../frontend/manage.php" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Revenir sur la Programmation">
						<i class="fa fa-undo"></i> Retour Prog</a>
					</li>
					<li class="active">
						<a href="{{route('showAdminHome')}}" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Accueil Administration">
						<i class="fa fa-home"></i> Administration</a>
					</li>
					<li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Tables Synthèses <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                        	<li >
                            	<a href="{{route('showDiffuser')}}">
                                	<i class="fas fa-cog"></i> Synthèse Diffuseurs
                                </a>
                            </li>
                            <li >
                            	<a href="{{route('showAnniversaires')}}">
                                	<i class="fa fa-bell"></i> Anniversaires
                                </a>
                            </li>
                        	<li >
                            	<a href="{{route('showPumps')}}">
                                	<i class="fas fa-cog"></i> Pompes
                                </a>
                            </li>
                        	<li >
                            	<a href="{{route('showBackOrder')}}">
                                	<i class="fa fa-clock"></i> Commandes en attente
                                </a>
                            </li>
                        	<li >
                            	<a href="{{route('showInvoiceOrder')}}">
                                	<i class="fa fa-wallet"></i> Commandes à facturer
                                </a>
                            </li>
                        	<li >
                            	<a href="#">
                                	<i class="fa fa-times-circle"></i></i> Factures en retard
                                </a>
                            </li>
                        </ul>
					</li>
                    <li class="menu-dropdown classic-menu-dropdown ">
                    	<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
                        	Création <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li >
                                <a href="new-pump.php">
                                	<i class="fa fa-plus"></i> Pompes
                                </a>
                            </li>
                            <li >
                                <a href="new-diffuser.php">
                                	<i class="fa fa-plus"></i> Diffuseurs
                                </a>
                            </li>
                            <li >
                                <a href="new-product.php">
                                	<i class="fa fa-plus"></i> Produit
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li >
                            	<a href="programme.php">
                                	<i class="fa fa-copy"></i> Multiple iSens.dat
                                </a>
                            </li>
                        </ul>
                    </li>
					<li >
						<a href="livraison.php" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Effectuer une livraison de diffuseurs et de parfum">
						<i class="fa fa-plane"></i> Livraison
						</a>
					</li>
					<li >
						<a href="{{ route('showSav') }}" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Déclarer un diffuseur en S.A.V ou effectuer une opération">
						<i class="fa fa-wrench"></i> S.A.V
						</a>
					</li>
					<li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Utilisateurs <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li >
                            	<a href="{{route('showAddUser')}}">
                                	<i class="fa fa-user-plus"></i> Ajouter un nouvel utilisateur
                                </a>
							</li>
							<li >
                            	<a href="{{route('showUser')}}">
                                	<i class="fa fa-users"></i> Synthèse des utilisateurs
                                </a>
							</li>
                            <li >
                                <a href="{{route('showAssociation')}}">
                                	<i class="fa fa-link"></i> Association diffuseur-utilisateur
                                </a>
                            </li>
						</ul>
					</li>
					<li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Enseignes <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li >
                            	<a href="{{route('showAddCompany')}}">
                                	<i class="fa fa-plus"></i> Ajouter une nouvelle enseigne
                                </a>
							</li>
							<li >
                            	<a href="{{route('showCompanies')}}">
                                	<i class="fa fa-cog"></i> Synthèse des enseignes
                                </a>
							</li>
						</ul>
					</li>
					<li >
						<a href="dolibarr.php" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Retrouver un BL">
						<i class="icon-magnifier"></i> BL
						</a>
					</li>
				</ul>
			</div>
			<!-- END MEGA MENU -->
		</div>
	</div>
	<!-- END HEADER MENU -->
</div>