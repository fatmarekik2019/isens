<?php
require_once('../../global/config.php');
require_once('../../../services/Diffuser.php');

$records = array();
$records["data"] = array();

$diff = new Diffuser();

if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "DELETE") {
	$res = $diff->Delete($_REQUEST["Diffuser"][0][0]);
	if ($res) {
		$records["customActionStatus"] = "OK";
		$records["customActionMessage"] = "Le diffuseur a été supprimé avec succès.";
	} else {
		$records["customActionStatus"] = "KO";
		$records["customActionMessage"] = "Un problème est survenu, le diffuseur n'a pas été supprimé.";
	}
}
else if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "UPDATE") {
	$res = $diff->Update($_REQUEST["Diffuser"][0][0], $_REQUEST["Diffuser"][0][13], $_REQUEST["Diffuser"][0][4], $_REQUEST["Diffuser"][0][6], $_REQUEST["Diffuser"][0][1], $_REQUEST["Diffuser"][0][2], $_REQUEST["Diffuser"][0][3], $_REQUEST["Diffuser"][0][8], $_REQUEST["Diffuser"][0][10], $_REQUEST["Diffuser"][0][11], $_REQUEST["Diffuser"][0][12]);
	if ($res) {
		$records["customActionStatus"] = "OK";
		$records["customActionMessage"] = "Le diffuseur a été mis à jour avec succès.";
	} else {
		$records["customActionStatus"] = "KO";
		$records["customActionMessage"] = "Un problème est survenu, le diffuseur n'a pas été mis à jour.";
	}
}

$diff_list = $diff->selectAll();
foreach ($diff_list as $diff_infos) {
	$records["data"][] = array(
		$diff_infos['Id'],
		$diff_infos['Name'],
		$diff_infos['Num_serie'],
		$diff_infos['Type'],
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
		'<a class="edit" href="javascript:;">Editer</a>',
		'<a class="delete" href="javascript:;">Supprimer</a>',
	);
}

echo json_encode($records);
?>