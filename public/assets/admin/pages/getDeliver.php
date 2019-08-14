<?php
require_once('../../global/config.php');
require_once('../../../services/Deliver.php');

$records = array();
$records["data"] = array();

if (isset($_GET['id'])) {
	$deliver = Deliver::Select($_GET['id']);
	foreach ($anniv_list as $anniv_infos) {
		$records["data"][] = array(
			$anniv_infos['Id'],
			$anniv_infos['Name'],
			$anniv_infos['Company_Name'],
			$anniv_infos['Date_Crea_fr'],
			$anniv_infos['Date_Anniv_fr'],
			$anniv_infos['Date_Renouv_fr'],
			$anniv_infos['Diffusers'],
			$anniv_infos['Parfum_Id'],
			$anniv_infos['Parfum_Name'],
			$anniv_infos['Nb_Rec'],
			$anniv_infos['Type_Rec'],
			$anniv_infos['New_Cons'],
			$anniv_infos['Old_Cons'],
			'<a class="edit" href="javascript:;">Renouveler d\'urgence</a>',
		);
	}
}

echo json_encode($records);
?>