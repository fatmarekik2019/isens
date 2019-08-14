<?php
require_once('../../global/config.php');

$db = new mod_db();
$result = array();

$data = $db->assoc("SELECT l.Flags, COUNT(d.Country) AS data FROM isens_locations AS l LEFT JOIN isens_Diffusers AS d ON l.Id = d.Country GROUP BY l.Flags");
foreach ($data as $row) {
	$result[$row["Flags"]] = $row["data"];
}

echo json_encode($result);
?>