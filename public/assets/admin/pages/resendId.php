<?php require_once('../../global/config.php');
include_once '../../../phpmailer/class.phpmailer.php';
require_once('../../../services/Users.php');

if (isset($_POST['user'])) {
	$success = Users::NewPassword($_POST['user'][0]);
	if ($success) {
		echo "success";
	} else {
		echo $success;
	}
}
?>