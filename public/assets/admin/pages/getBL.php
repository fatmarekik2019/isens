<?php
require_once('../../global/config.php');
require_once('../../../services/Deliver.php');

if (isset($_GET['company'])) {
	$db_doli = mysql_connect("db465536902.db.1and1.com", "dbo465536902", "neiljad1");
	mysql_select_db('db465536902', $db_doli);
	mysql_query("SET NAMES 'utf8'");

	$result = mysql_query('SELECT rowid, ref FROM llx_expedition WHERE masked = 0 AND fk_soc = '.$_GET['company'], $db_doli);
	while ($row = mysql_fetch_assoc($result)) {
		$records[$row["rowid"]] = $row["ref"];
	}

	mysql_close($db_doli);
}

echo json_encode($records);
?>