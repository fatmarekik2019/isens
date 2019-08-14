<?php
require_once("../../global/config.php");
require_once("../../../services/Deliver.php");

if (isset($_POST["deliver_id"]) && isset($_POST["dp_new_anniv"]) && isset($_POST["raison"])) {
	$deliver = Deliver::Select($_POST["deliver_id"]);
	$change = Deliver::changeAnniversaire($_POST["deliver_id"], $_POST["dp_new_anniv"], $_POST["raison"], $deliver["Nb_Ann"], $deliver["Type_Ann"], $deliver["diffusers"]);
	if ($change) echo "ok";
	else echo "Veuillez réessayer.";
} else {
	echo "Formulaire incomplet.";
}
?>