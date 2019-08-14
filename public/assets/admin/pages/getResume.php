<?php
require_once('../../global/config.php');

$records = array();
$records["data"] = array();


if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "DELETE") {
	if (isset($_REQUEST["Diffuser"])) {
		require_once('../../../services/Diffuser.php');
		$res = Diffuser::Delete($_REQUEST["Diffuser"][0][0]);
		if ($res) {
			$records["customActionStatus"] = "OK";
			$records["customActionMessage"] = "Le diffuseur a été supprimé avec succès.";
		} else {
			$records["customActionStatus"] = "KO";
			$records["customActionMessage"] = "Un problème est survenu, le diffuseur n'a pas été supprimé.";
		}
	}
	elseif (isset($_REQUEST["User"])) {
		require_once('../../../services/Users.php');
		$res = Users::delete($_REQUEST["User"][0][0]);
		if ($res) {
			$records["customActionStatus"] = "OK";
			$records["customActionMessage"] = "L'utilisateur a été supprimé avec succès.";
		} else {
			$records["customActionStatus"] = "KO";
			$records["customActionMessage"] = "Un problème est survenu, l'utilisateur n'a pas été supprimé.";
		}
	}
	elseif (isset($_REQUEST["Company"])) {
		require_once('../../../services/Users.php');
		$res = Users::deleteCompany($_REQUEST["Company"][0][0]);
		if ($res) {
			$records["customActionStatus"] = "OK";
			$records["customActionMessage"] = "L'enseigne a été supprimé avec succès.";
		} else {
			$records["customActionStatus"] = "KO";
			$records["customActionMessage"] = "Un problème est survenu, l'enseigne n'a pas été supprimé.";
		}
	}
}
elseif (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "UPDATE") {
	if (isset($_REQUEST['Diffuser'])) {
		require_once('../../../services/Diffuser.php');
		$res = Diffuser::Update($_REQUEST["Diffuser"][0][0], $_REQUEST["Diffuser"][0][15], $_REQUEST["Diffuser"][0][6], $_REQUEST["Diffuser"][0][8], $_REQUEST["Diffuser"][0][1], $_REQUEST["Diffuser"][0][3], $_REQUEST["Diffuser"][0][10], $_REQUEST["Diffuser"][0][12], $_REQUEST["Diffuser"][0][13], $_REQUEST["Diffuser"][0][14], $_REQUEST["Diffuser"][0][17], $_REQUEST["Diffuser"][0][18], $_REQUEST["Diffuser"][0][4]);
		if ($res) {
			$records["customActionStatus"] = "OK";
			$records["customActionMessage"] = "Le diffuseur a été mis à jour avec succès.";
		} else {
			$records["customActionStatus"] = "KO";
			$records["customActionMessage"] = "Un problème est survenu, le diffuseur n'a pas été mis à jour.";
		}
	}
	elseif (isset($_POST['User'])) {
		require_once('../../../services/Users.php');
		$res = Users::update($_POST['User'][0][0], $_POST['User'][0][1], $_POST['User'][0][2], $_POST['User'][0][3], $_POST['User'][0][5], $_POST['User'][0][7]);
		if ($res) {
			$records["customActionStatus"] = "OK";
			$records["customActionMessage"] = "L'utilisateur a été mis à jour avec succès.";
		} else {
			$records["customActionStatus"] = "KO";
			$records["customActionMessage"] = "Un problème est survenu, l'utilisateur n'a pas été mis à jour.";
		}
	}
	elseif (isset($_POST['Company'])) {
		require_once('../../../services/Users.php');
		$res = Users::updateCompany($_POST['Company'][0][0], $_POST['Company'][0][1], $_POST['Company'][0][2]);
		if ($res) {
			$records["customActionStatus"] = "OK";
			$records["customActionMessage"] = "L'enseigne a été mis à jour avec succès.";
		} else {
			$records["customActionStatus"] = "KO";
			$records["customActionMessage"] = "Un problème est survenu, l'enseigne n'a pas été mis à jour.";
		}
	}
	elseif (isset($_POST['Anniversaire'])) {
		require_once('../../../services/Deliver.php');
		$res = Deliver::Update($_POST['Anniversaire'][0][0], $_POST['Anniversaire'][0][1], $_POST['Anniversaire'][0][2], $_POST['Anniversaire'][0][4], $_POST['Anniversaire'][0][9], $_POST['Anniversaire'][0][10], $_POST['Anniversaire'][0][7], $_POST['Anniversaire'][0][14], $_POST['Anniversaire'][0][13], $_POST['Anniversaire'][0][12], explode(", ", $_POST['Anniversaire'][0][6]));
		if ($res) {
			$records["customActionStatus"] = "OK";
			$records["customActionMessage"] = "Le groupe de livraison a été mis à jour avec succès.";
		} else {
			$records["customActionStatus"] = "KO";
			$records["customActionMessage"] = "Un problème est survenu, le groupe de livraison n'a pas été mis à jour.";
		}
	}
}

if (isset($_GET['table']) && $_GET['table'] == "diffusers") {
	require_once('../../../services/Diffuser.php');
	$diff_list = Diffuser::selectAll();
	foreach ($diff_list as $diff_infos) {
		$records["data"][] = array(
			$diff_infos['Id'],
			$diff_infos['Name'],
			$diff_infos['Num_serie'],
			$diff_infos['Type'],
			$diff_infos['fk_soc'],
			$diff_infos['Societe_Name'],
			$diff_infos['Company_Id'],
			$diff_infos['Company_Name'],
			$diff_infos['Reseau_Id'],
			$diff_infos['Reseau_Name'],
			$diff_infos['location_id'],
			$diff_infos['Country'],
			$diff_infos['City'],
			$diff_infos['Address'],
			$diff_infos['Postcode'],
			$diff_infos['User_Id'],
			$diff_infos['User_Name'],
			$diff_infos['Color'],
			$diff_infos['Etat'],
			$diff_infos['Etat_dlb'],
			$diff_infos['Code'],
			$diff_infos['Date_Liv_fr'],
			$diff_infos['Pump_Id'],
			$diff_infos['Num_Pump'],
			$diff_infos['Type_Pump'],
			$diff_infos['Date_Pump_fr'],
			$diff_infos['Date_Anniv_fr'],
			$diff_infos['Date_Renouv_fr'],
			$diff_infos['Parfum_o_n'],
			'<a class="edit" href="javascript:;">Editer</a>',
			'<a class="delete" href="javascript:;">Supprimer</a>'
		);
	}
}
elseif (isset($_GET['table']) && $_GET['table'] == "users") {
	require_once('../../../services/Users.php');
	$user_list = Users::selectAll();
	foreach ($user_list as $user_infos) {
		$records["data"][] = array(
			$user_infos['Id'],
			$user_infos['Login'],
			$user_infos['Email'],
			$user_infos['comp_Id'],
			$user_infos['comp_name'],
			$user_infos['Reseau_Id'],
			$user_infos['Reseau_Name'],
			$user_infos['group_id'],
			$user_infos['group_name'],
			$user_infos['date_registered'],
			$user_infos['lastlogin'],
			'<a class="resend" href="javascript:;">Renvoyez login</a>',
			'<a class="edit" href="javascript:;">Editer</a>',
			'<a class="delete" href="javascript:;">Supprimer</a>'
		);
	}
}
elseif (isset($_GET['table']) && $_GET['table'] == "companies") {
	require_once('../../../services/Users.php');
	$company_list = Users::selectCompany();
	foreach ($company_list as $company_infos) {
		$records["data"][] = array(
			$company_infos['Id'],
			$company_infos['Name'],
			$company_infos['Reseau_Id'],
			$company_infos['Reseau_Name'],
			'<a class="edit" href="javascript:;">Editer</a>',
			'<a class="delete" href="javascript:;">Supprimer</a>'
		);
	}
}
elseif (isset($_GET['table']) && $_GET['table'] == "pumps") {
	require_once('../../../services/Pump.php');
	$pump_list = Pump::selectAll();
	foreach ($pump_list as $pump_infos) {
		$records["data"][] = array(
			$pump_infos['Pump_id'],
			$pump_infos['Pump_ref'],
			$pump_infos['label'],
			$pump_infos['Date_fr'],
			$pump_infos['nom'],
			$pump_infos['fk_etatequipement'],
			$pump_infos['Code'],
			$pump_infos['Diff_ref']
		);
	}
}
elseif (isset($_GET['table']) && $_GET['table'] == "anniversaires") {
	require_once('../../../services/Deliver.php');
	$anniv_list = Deliver::selectAll();
	foreach ($anniv_list as $anniv_infos) {
		$records["data"][] = array(
			$anniv_infos['Id'],
			$anniv_infos['Name'],
			$anniv_infos['Company_Name'],
			$anniv_infos['Date_Crea_fr'],
			$anniv_infos['BL'],
			$anniv_infos['Date_Anniv_fr'],
			$anniv_infos['Date_Renouv_fr'],
			$anniv_infos['Diffusers'],
			$anniv_infos['Parfum_Id'],
			$anniv_infos['Parfum_Name'],
			$anniv_infos['Nb_Rec'],
			$anniv_infos['Type_Rec'],
			$anniv_infos['New_Cons'],
			$anniv_infos['Old_Cons'],
			'<a class="edit" href="javascript:;">Renouvellement d\'urgence</a>'
		);
	}
}
elseif (isset($_GET['table']) && $_GET['table'] == "diff-history") {
	require_once('../../../services/History.php');
	$diff_history_list = History::Select($_POST[0]);
	foreach ($diff_history_list as $diff_history_infos) {
		$records["data"][] = array(
			$diff_history_infos['Date'],
			$diff_history_infos['Event'],
			$diff_history_infos['User_Name']
		);
	}
}
elseif (isset($_GET['table']) && $_GET['table'] == "deliver-history") {
	require_once('../../../services/History.php');
	$deliver_history_list = History::Select(0, $_POST[0]);
	foreach ($deliver_history_list as $deliver_history_infos) {
		$records["data"][] = array(
			$deliver_history_infos['Date'],
			$deliver_history_infos['Event'],
			$deliver_history_infos['User_Name']
		);
	}
}
elseif (isset($_GET['table']) && $_GET['table'] == "attentes") {
	$db_doli = mysql_connect("db465536902.db.1and1.com", "dbo465536902", "neiljad1");
	mysql_select_db('db465536902', $db_doli);
	mysql_query("SET NAMES 'utf8'");

	$attente_list = mysql_query("SELECT com.rowid, com.ref, com.ref_client, soc.nom, DATE_FORMAT(com.date_creation, '%d/%m/%Y') AS date_creation, DATE_FORMAT(com.date_livraison, '%d/%m/%Y') AS date_livraison, prod.label, comdet.qty, SUM(expdet.qty) AS qty_exp FROM llx_commande AS com LEFT JOIN llx_commandedet as comdet ON com.rowid = comdet.fk_commande LEFT JOIN llx_expeditiondet as expdet ON comdet.rowid = expdet.fk_origin_line LEFT JOIN llx_expedition as exp ON expdet.fk_expedition = exp.rowid LEFT JOIN llx_societe AS soc ON com.fk_soc = soc.rowid LEFT JOIN llx_product AS prod ON comdet.fk_product = prod.rowid WHERE (com.fk_statut = 1 OR com.fk_statut = 2) GROUP BY comdet.rowid, comdet.fk_product", $db_doli);
	while ($row = mysql_fetch_assoc($attente_list)) {
		$records["data"][] = array(
			"<a target=\"_blank\" href=\"http://dlb.shamsconseils.com/htdocs/commande/fiche.php?id=".$row["rowid"]."\">".$row["ref"]." <i class=\"fa fa-external-link\"></i></a>",
			$row["ref_client"],
			$row["nom"],
			$row["date_creation"],
			$row["date_livraison"],
			$row["label"],
			$row["qty"],
			$row["qty"] - $row["qty_exp"]
		);
	}
	
	mysql_close($db_doli);
}
elseif (isset($_GET['table']) && $_GET['table'] == "retards") {
	$db_doli = mysql_connect("db465536902.db.1and1.com", "dbo465536902", "neiljad1");
	mysql_select_db('db465536902', $db_doli);
	mysql_query("SET NAMES 'utf8'");

	$retard_list = mysql_query("SELECT f.rowid, f.facnumber, soc.nom, DATE_FORMAT(f.date_lim_reglement, '%d/%m/%Y') AS date_limite, date_lim_reglement, DATE_FORMAT(f.datec, '%d/%m/%Y') AS datec, f.total, f.total_ttc FROM llx_facture AS f LEFT JOIN llx_societe as soc ON f.fk_soc = soc.rowid WHERE f.paye = 0 AND f.facnumber NOT LIKE 'AC%'", $db_doli);
	while ($row = mysql_fetch_assoc($retard_list)) {
		if ($row["rowid"]) {
			$com = mysql_fetch_assoc(mysql_query("SELECT IF(sourcetype = 'facture', fk_target, fk_source) AS fk, IF(sourcetype = 'facture', targettype, sourcetype) AS type FROM llx_element_element WHERE IF(sourcetype = 'facture', fk_source = ".$row["rowid"].", fk_target = ".$row["rowid"]." AND targettype = 'facture') HAVING type = 'commande' LIMIT 1", $db_doli));
			if (!$com) $com = mysql_fetch_assoc(mysql_query("SELECT IF(sourcetype = 'facture', fk_target, fk_source) AS fk, IF(sourcetype = 'facture', targettype, sourcetype) AS type FROM llx_element_element WHERE IF(sourcetype = 'facture', fk_source = ".$row["rowid"].", fk_target = ".$row["rowid"]." AND targettype = 'facture') LIMIT 1", $db_doli));
			if ($com["type"] == "commande") {
				$bl = mysql_fetch_assoc(mysql_query("SELECT ref FROM llx_commande WHERE rowid = ".$com["fk"]." LIMIT 1", $db_doli));
				if ($com["fk"]) $row["bl"] = "<a target=\"_blank\" href=\"http://dlb.shamsconseils.com/htdocs/commande/fiche.php?id=".$com["fk"]."\">".$bl["ref"]." <i class=\"fa fa-external-link\"></i></a>";
			} else {
				$com = mysql_fetch_assoc(mysql_query("SELECT IF(sourcetype = 'shipping', fk_target, fk_source) AS fk, IF(sourcetype = 'shipping', targettype, sourcetype) AS type FROM llx_element_element WHERE IF(sourcetype = 'shipping', fk_source = ".$com["fk"].", fk_target = ".$com["fk"]." AND targettype = 'shipping') HAVING type = 'commande' LIMIT 1", $db_doli));
				$bl = mysql_fetch_assoc(mysql_query("SELECT ref FROM llx_commande WHERE rowid = ".$com["fk"]." LIMIT 1", $db_doli));
				if ($com["fk"]) $row["bl"] = "<a target=\"_blank\" href=\"http://dlb.shamsconseils.com/htdocs/commande/fiche.php?id=".$com["fk"]."\">".$bl["ref"]." <i class=\"fa fa-external-link\"></i></a>";
			}
		}
		$records["data"][] = array(
			$row["rowid"],
			"<a target=\"_blank\" href=\"http://dlb.shamsconseils.com/htdocs/compta/facture.php?facid=".$row["rowid"]."\">".$row["facnumber"]." <i class=\"fa fa-external-link\"></i></a>",
			$row["nom"],
			$row["datec"],
			$row["date_limite"],
			floor((time() - strtotime($row["date_lim_reglement"])) / (60*60*24)),
			number_format($row["total"], 2, ',', ' '),
			number_format($row["total_ttc"], 2, ',', ' '),
			$row["bl"],
			'<a class="resend" href="javascript:;">Relancer client</a>'
		);
	}
	
	mysql_close($db_doli);
}
elseif (isset($_GET['table']) && $_GET['table'] == "facturer") {
	$db_doli = mysql_connect("db465536902.db.1and1.com", "dbo465536902", "neiljad1");
	mysql_select_db('db465536902', $db_doli);
	mysql_query("SET NAMES 'utf8'");

	$facturer_list = mysql_query("SELECT com.rowid, com.ref, soc.nom, DATE_FORMAT(com.date_creation, '%d/%m/%Y') AS date_creation, DATE_FORMAT(com.date_livraison, '%d/%m/%Y') AS date_livraison, c.quantity AS qty_prod, SUM(expdet.qty) AS qty_exp, com.fk_statut, com.total_ht FROM llx_commande AS com
JOIN (SELECT fk_commande, SUM(qty) AS quantity FROM llx_commandedet GROUP BY fk_commande) AS c ON com.rowid = c.fk_commande LEFT JOIN llx_commandedet as comdet ON com.rowid = comdet.fk_commande LEFT JOIN llx_expeditiondet as expdet ON comdet.rowid = expdet.fk_origin_line LEFT JOIN llx_societe AS soc ON com.fk_soc = soc.rowid GROUP BY rowid", $db_doli);
	while ($row = mysql_fetch_assoc($facturer_list)) {
		
		$com = mysql_fetch_assoc(mysql_query("SELECT IF(sourcetype = 'commande', fk_target, fk_source) AS fk, IF(sourcetype = 'commande', targettype, sourcetype) AS type FROM llx_element_element WHERE IF(sourcetype = 'commande', fk_source = ".$row["rowid"].", fk_target = ".$row["rowid"]." AND targettype = 'commande') HAVING type = 'facture' LIMIT 1", $db_doli));
		if (!$com["fk"]) $com = mysql_fetch_assoc(mysql_query("SELECT IF(sourcetype = 'commande', fk_target, fk_source) AS fk, IF(sourcetype = 'commande', targettype, sourcetype) AS type FROM llx_element_element WHERE IF(sourcetype = 'commande', fk_source = ".$row["rowid"].", fk_target = ".$row["rowid"]." AND targettype = 'commande') LIMIT 1", $db_doli));
		if ($com["type"] == "facture") {
			$bl = mysql_fetch_assoc(mysql_query("SELECT facnumber FROM llx_facture WHERE rowid = ".$com["fk"]." LIMIT 1", $db_doli));
		} else {
			$com = mysql_fetch_assoc(mysql_query("SELECT IF(sourcetype = 'shipping', fk_target, fk_source) AS fk, IF(sourcetype = 'shipping', targettype, sourcetype) AS type FROM llx_element_element WHERE IF(sourcetype = 'shipping', fk_source = ".$com["fk"].", fk_target = ".$com["fk"]." AND targettype = 'shipping') HAVING type = 'facture' LIMIT 1", $db_doli));
			$bl = mysql_fetch_assoc(mysql_query("SELECT facnumber FROM llx_facture WHERE rowid = ".$com["fk"]." LIMIT 1", $db_doli));
		}
		if ($com["fk"]) $row["facture"] = "<a target=\"_blank\" href=\"http://dlb.shamsconseils.com/htdocs/compta/facture.php?facid=".$com["fk"]."\">".$bl["facnumber"]." <i class=\"fa fa-external-link\"></i></a>";
		else $row["facture"] = "<a target=\"_blank\" href=\"http://dlb.shamsconseils.com/htdocs/commande/fiche.php?id=".$row["rowid"]."\">A Facturer</a>";
		
		$db = new mod_db();
		$code = $db->assoc("SELECT Code FROM isens_Etats WHERE fk_statut = ".$row["fk_statut"]." LIMIT 1");
		$row["Code"] = $code[0]["Code"];
		$records["data"][] = array(
			"<a target=\"_blank\" href=\"http://dlb.shamsconseils.com/htdocs/commande/fiche.php?id=".$row["rowid"]."\">".$row["ref"]." <i class=\"fa fa-external-link\"></i></a>",
			$row["nom"],
			$row["date_creation"],
			$row["date_livraison"],
			$row["qty_prod"],
			$row["qty_prod"] - $row["qty_exp"],
			$row["Code"],
			$row["facture"],
			number_format($row["total_ht"], 2, ',', ' ')
		);
	}
	
	mysql_close($db_doli);
}


echo json_encode($records);
?>