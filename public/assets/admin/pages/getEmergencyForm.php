<?php

if (isset($_GET["id"])) {
	require_once("../../../services/Deliver.php");
	
	$deliver = Deliver::Select($_GET["id"]);
	
?>
	
    <div class="row">
    	<div class="col-md-12">
            <form id="emergency-anniv-form" class="form form-horizontal" role="form">
                <div class="form-group">
                    <label class="control-label col-md-4">Date Anniversaire actuelle / Current birthday date</label>
                    <div class="col-md-7">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <input class="form-control date-picker" id="dp_anniv" type="text" name="dp_anniv" value="<?php echo $deliver["Date_Anniv_txt"]; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Nouvelle Date Anniversaire / New birthday date</label>
                    <div class="col-md-7">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <input class="form-control date-picker" id="dp_new_anniv" type="text" name="dp_new_anniv">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Raison - Commentaire / Reason - Comment</label>
                    <div class="col-md-7">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <textarea class="form-control" id="raison" name="raison"></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="deliver_id" value="<?php echo $_GET["id"]; ?>">
            </form>
        </div>
    </div>

<?php } ?>