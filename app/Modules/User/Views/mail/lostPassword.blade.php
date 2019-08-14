<!DOCTYPE html>
<html>
<head>
	<title>reset password</title>
</head>
<body>
	<div>
		<h1>Salut {{ $display_name }},</h1>
		<br>
		<br>
	    Nous avons bien reçu votre demande de restauration de mot de passe, il suffit maintenant de cliquer sue le bouton ci-dessous pour entrer un nouveau mot de passe

	    <br><br>Merci !</font></span>
	    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 3px;background-color: #FB236A;">
	        <tbody>
	            <tr>
	                <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Helvetica; font-size: 18px; padding: 18px;">
	                    <a class="mcnButton " title="RESTAURER LE MOT DE PASSE" href="{{ $resetURL }}" target="_self" style="font-weight: bold;letter-spacing: -0.5px;line-height: 100%;text-align:center;text-decoration: none;color: #FFFFFF;">RESTAURER LE MOT DE PASSE</a>
	                </td>
	            </tr>
	    	</tbody>
	    </table>
	</div>
</body>
</html>
