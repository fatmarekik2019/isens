<?php
require_once("../../global/config.php");
include_once '../../../phpmailer/PHPMailerAutoload.php';

	if ((isset($_POST["dest"]) || isset($_POST["newdest"])) && isset($_POST["subject"]) && isset($_POST["message"]) && isset($_POST["facnumber"])) {
		
		if (isset($_POST["newdest"])) $dest = $_POST["newdest"];
		else $dest = $_POST["dest"];
		
		$mail = new PHPMailer(true); 
		
		$mail->setLanguage('fr', '../../../phpmailer/language/');
		$mail->CharSet = 'UTF-8';
		$mail->setFrom('no-reply@shamsconseils.com', 'No-Reply Comptabilité Shams Conseils');
		$mail->addAddress($dest);
		$mail->addCC("s.dalli@shamsconseils.com");
		$mail->addBCC("info@isensdiffuser.com");
		$mail->addReplyTo('s.dalli@shamsconseils.com', 'Service Comptabilité');
		$mail->isHTML(true);
		$mail->Subject = $_POST["subject"];
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; 
		$mail->AddEmbeddedImage("../../frontend/layout/img/logos/LOGO-SHAMS-2014-DEC.jpg", "logo");
		$mail->addStringAttachment(file_get_contents('sftp://u35397007:neiljad1@home88366821.1and1-data.host/dlb/documents/facture/'.$_POST["facnumber"].'/'.$_POST["facnumber"].'.pdf'), $_POST["facnumber"].'.pdf');

		/*$AdminsReseau = $db->assoc("SELECT email FROM users WHERE group_id = 3 AND Reseau_Id = $Reseau_Id");
		
		foreach($AdminsReseau as $key => $value)
		{
			$mail->AddCC($value);
		}*/
		
		$body = $_POST["message"]."
		<br>
		Cordialement / Best regards,<br>
		<br>
		<b>Le Service Comptabilité</b><br>
		<br>
		<a href=\"mailto:s.dalli@shamsconseils.com\">s.dalli@shamsconseils.com</a><br>
		<br>
		<br>
		<img src=\"cid:logo\">
		<br>
		45 Rue de Croulebarbe 75013 Paris<br>
		Tél. : +(33) (0) 143 363 264<br>
		Fax : +(33) (0) 950 151 640<br>
		Email : info@shamsconseils.com<br>
		Site internet : <a href=\"www.shamsconseils.com\">http://www.shamsconseils.com</a>";
		$mail->MsgHTML($body);
		
		if(!$mail->Send()){
		   echo "Erreur Mailer: " . $mail->ErrorInfo;
		}else{
		   echo "ok";
		}
	} else {
		echo "Formulaire incomplet.";
	}
?>