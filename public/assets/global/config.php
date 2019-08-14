<?php
/* This script is setting all vars */

##### Setting class #####
session_start();
include_once("layer.php");
include_once("../../phpmailer/PHPMailerAutoload.php");

##### Setting SQL Vars #####

if($_SERVER['SERVER_NAME'] == "localhost")
	$local = true;
elseif($_SERVER['SERVER_NAME'] == "zubi")
	$local = "zubi.fr";
else
	$local = false;

if($local)
{
	$sql_host = 'localhost';
	$sql_user = 'root';
	$sql_pass = 'root';
	$sql_name = 'iSens';
    $GLOBALS['serverAdresse'] = 'localhost/exhalia/iSens - Shams vPHP/';
}
else
{
	$sql_host = 'db2948.1and1.fr';
	$sql_user = 'dbo348227234';
	$sql_pass = 'jX6M$c#U';
	$sql_name = 'db348227234';
    $GLOBALS['serverAdresse'] = 'isensdiffuser.com/';
}

// ------- AUTOLOGIN ---------
if (!isset($_SESSION["email"])) {
	if (isset($_COOKIE['autologin'])) {	
		$db = new mod_db();
		include_once("../../services/Logs.php");
		$log = new Logs();

		// Récupération de la valeur du cookie
		$key = $db->quote_smart($_COOKIE['autologin']);
	
		$user = $db->objects("SELECT u.id, u.email, u.password, u.Company_Id, u.Reseau_Id, u.group_id, u.display_name, u.avatar, u.Country, u.City, u.date_registered, u.dolibarr_id, g.admin, g.access_level, c.Name as comp_name FROM users as u, users_groups as g, isens_Company as c WHERE SHA1(CONCAT('zefj31kw', `temporary_password`, 'bod4cp83'))=$key AND g.id = u.group_id AND c.Id = u.Company_Id");
		$log->insertUser($key, "try to authenticate : ".$key." - connexion automatique");
	
		// si on a un resultat on récupère le diffuseur de l'utilisateur
		if(!empty($user)){
			$log->insertUser($user->email, "login success : $user->email - connexion automatique");
			$_SESSION["id"] = $user->id;
			$_SESSION["email"] = $user->email;
			$_SESSION["admin"] = $user->admin;
			$_SESSION["access_level"] = $user->access_level;
			$_SESSION["company"] = $user->comp_name;
			$_SESSION["user_name"] = $user->display_name;
			if (!empty($user->dolibarr_id)) $_SESSION["dolibarr_id"] = $user->dolibarr_id;
			if (!empty($user->avatar)) $_SESSION["avatar"] = $user->avatar;
			else $_SESSION["avatar"] = "no-avatar.png";
			if ($user->Country != 'NULL') $_SESSION["country"] = $user->Country;
			else $_SESSION["country"] = "Non spécifié";
			if ($user->City != 'NULL') $_SESSION["city"] = $user->City;
			else $_SESSION["city"] = "Non spécifié";
			$_SESSION["date_registered"] = $user->date_registered;
		}else{
			$log->insertUser($key, "Echec d'Authentification : connexion automatique (mauvais cookie)");
		}
	}
}

setlocale(LC_TIME, 'fr_FR'); // langue des mois en fonction de l'utilisateur
?>