<?php
require_once('../../global/config.php');
require_once('../../../services/Location.php');

if (isset($_GET['country'])) {

	$plug = Location::getPlug($_GET['country']);
	if ($plug == "EU") $records = "EUROPE";
	elseif ($plug == "UK") $records = "UK";
	elseif ($plug == "US") $records = "US";

}

echo json_encode($records);
?>