<?php
require_once('../../global/config.php');
require_once('../../../services/Diffuser.php');

if (isset($_POST['diffuser'])) {
	$obj = Diffuser::Select($_POST['diffuser']);
	if ($obj->User_Id) {
		echo "false"; // already exist
	} else {
		echo "true";
	}
} else {
	echo "false";
}
?>