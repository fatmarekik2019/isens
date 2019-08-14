<?php
	require_once('../../global/config.php');

if (isset($_GET['formUser'])) {
	require_once('../../../services/Users.php');
	$results = Users::selectCompany();
	foreach($results as $company) {
		$records[0][$company["Id"]] = $company["Name"];
	}
	$results = Users::selectReseau();
	foreach($results as $reseau) {
		$records[1][$reseau["Id"]] = $reseau["Name"];
	}
	$records[2] = array(
		"1" => "Administrators",
		"2" => "Members",
		"3" => "Reseaux"
	);
}
elseif (isset($_GET['formDiffuser'])) {
	require_once('../../../services/Diffuser.php');
	require_once('../../../services/Users.php');
	require_once('../../../services/Location.php');
	$results = Diffuser::getTypeList();
	foreach($results as $type) {
		$records[0][$type["Value"]] = $type["Value"];
	}
	$results = Users::selectCompany();
	foreach($results as $company) {
		$records[1][$company["Id"]] = $company["Name"];
	}
	$results = Users::selectReseau();
	foreach($results as $reseau) {
		$records[2][$reseau["Id"]] = $reseau["Name"];
	}
	$results = Location::getLocationList();
	foreach($results as $location) {
		$records[3][] = $location;
	}
	$results = Users::selectAll();
	foreach($results as $user) {
		$records[4][$user["Id"]] = $user["Login"];
	}
	$results = Diffuser::getColorList();
	foreach($results as $color) {
		$records[5][$color["Value"]] = $color["Value"];
	}
	$results = Diffuser::getEtatList();
	foreach($results as $etat) {
		$records[6][$etat["Id"]] = $etat["State"];
	}
	$results = Users::getSocieteList();
	foreach($results as $soc) {
		$records[7][$soc["societe_id"]] = $soc["societe_name"]." - ".$soc["libelle"];
	}
}
elseif (isset($_GET['formCompanies'])) {
	require_once('../../../services/Users.php');
	$results = Users::selectReseau();
	foreach($results as $reseau) {
		$records[$reseau["Id"]] = $reseau["Name"];
	}
}

echo json_encode($records);
?>