<?php
require_once('../../global/config.php');
require_once('../../../services/Users.php');

if (isset($_GET['id'])) {
	$reseau = Users::getReseau($_GET['id']);
	$records["id"] = $reseau["Reseau_Id"];
	$records["text"] = $reseau["Reseau_Name"];
}

echo json_encode($records);
?>