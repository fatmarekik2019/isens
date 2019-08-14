<?php
require_once('../../global/config.php');
require_once('../../../services/Diffuser.php');

if (isset($_GET['type']) && isset($_GET['color']) && isset($_GET['country'])) {

	$plug = Diffuser::getDiffModele($_GET['type'], $_GET['color'], $_GET['country']);
	$records["id"] = $plug["fk_product"];
	$records["text"] = $plug["Label"];

}

echo json_encode($records);
?>