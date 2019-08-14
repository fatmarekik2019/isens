<?php
require_once('../../global/config.php');

if (isset($_POST['num_serie'])) {
	if (isset($_GET['type']) && $_GET['type'] == "diffuser") {
		require_once('../../../services/Diffuser.php');
		
		$obj = Diffuser::getDiffuserBySerial($_POST['num_serie']);
		if ($obj) {
			echo "false"; // already exist
		} else {
			echo "true";
		}
	} else if (isset($_GET['type']) && $_GET['type'] == "pump") {
		require_once('../../../services/Pump.php');
		
		$obj = Pump::getPumpBySerial($_POST['num_serie']);
		if ($obj) {
			echo "false"; // already exist
		} else {
			echo "true";
		}
	}
} else {
	echo "false";
}
?>