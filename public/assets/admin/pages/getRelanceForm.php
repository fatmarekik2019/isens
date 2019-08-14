<?php require_once("../../global/config.php");

if (isset($_GET["id"])) {
	$db_doli = mysql_connect("db465536902.db.1and1.com", "dbo465536902", "neiljad1");
	mysql_select_db('db465536902', $db_doli);
	mysql_query("SET NAMES 'utf8'");

	$facture = mysql_fetch_assoc(mysql_query("SELECT facnumber, fk_soc, total, total_ttc, DATE_FORMAT(datec, '%d/%m/%Y') AS datec, date_lim_reglement, DATE_FORMAT(date_lim_reglement, '%d/%m/%Y') AS date_lim_fr FROM llx_facture WHERE rowid = ".$_GET["id"]." LIMIT 1"));
	
?>
	
    <div class="row">
    	<div class="col-md-12">
            <form id="relance-form" class="form form-horizontal" role="form">
                <div class="form-group">
                    <label class="control-label col-md-3">Destinataire <span class="required">*</span></label>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <select name="dest" id="select2_dest" class="select2 form-control dest">
                                <option value="">Sélectionnez / Select ...</option>
                                <?php
									$dest = mysql_query("SELECT email, civilite, lastname, firstname FROM llx_socpeople WHERE email != '' AND fk_soc = ".$facture["fk_soc"]);
                                    while ($row = mysql_fetch_assoc($dest)) {
                                        echo '<option value="'.$row["email"].'">'.$row["civilite"].' '.$row["lastname"].' '.$row["firstname"].' - '.$row["email"].'</option>';
                                    }
									mysql_close($db_doli);
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-9">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <input class="form-control dest" name="newdest">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Objet / Subject <span class="required">*</span></label>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <i class="fa"></i>
                                <input class="form-control placeholder-no-fix" type="text" name="subject" value="Relance de facture impayée numéro <?php echo $facture["facnumber"]; ?> du <?php echo $facture["datec"]; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Message <span class="required">*</span></label>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <textarea id="message" class="wysihtml5 form-control" rows="10" name="message">Madame, Monsieur<br>
<br>
Sauf erreur ou omission de notre part, la mise à jour de votre compte client présente à ce jour un solde débiteur de : <b><?php echo number_format($facture["total_ttc"], 2, ',', ' '); ?> € TTC</b><br>
<br>
En effet, la facture suivante, que nous vous avons adressée le <b><?php echo $facture["datec"]; ?></b> et payable au <b><?php echo $facture["date_lim_fr"]; ?></b> n’a  pas encore été honorée.<br>
<br>
<blockquote>
<b>Numéro de pièce	: <?php echo $facture["facnumber"]; ?></b><br>
<b>Date d'échéance	: <?php echo $facture["date_lim_fr"]; ?></b><br>
<b>Total TTC : <?php echo number_format($facture["total_ttc"], 2, ',', ' '); ?> €</b><br>
<b>Reste à payer : <?php echo number_format($facture["total_ttc"], 2, ',', ' '); ?> €</b><br>
</blockquote>
<br>
Les échéances étant dépassées de <b><?php echo floor((time() - strtotime($facture["date_lim_reglement"])) / (60*60*24)); ?> jours</b>, nous vous demandons pour la bonne règle de nos écritures, de nous adresser le règlement par retour de courrier.<br>
<br>
Considérant que le montant réclamé à ce jour peut être encore considérablement augmenté en cas de non-paiement, il est de votre intérêt de nous faire parvenir votre règlement <b>sous 48h</b>, au plus tard le <b><?php echo strftime("%d %B %Y", strtotime("+2 day")); ?></b>.<br>
<br>
Dans le cas où celui-ci aurait été adressé entre temps, nous vous prions de ne pas tenir compte de la présente.<br>
<br>
Nous vous prions de croire, Madame, Monsieur, en l’assurance de notre considération distinguée.</textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="facnumber" value="<?php echo $facture["facnumber"]; ?>">
            </form>
        </div>
    </div>

<?php } ?>