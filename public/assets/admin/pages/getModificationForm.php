<?php

if (isset($_GET["id"])) {
	require_once('../../global/config.php');
	require_once('../../../services/Location.php');
	require_once('../../../services/Users.php');
	require_once('../../../services/Diffuser.php');

	$diffuser = Diffuser::Select($_GET["id"]); ?>
	
    <div class="row">
    	<div class="col-md-12">
            <form id="modify-diffuser-form" class="form form-horizontal" role="form">
                <div class="form-group">
                    <label class="control-label col-md-3">Nom du diffuseur / Diffuser Name<span class="required"> * </span></label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <input class="form-control placeholder-no-fix" type="text" name="diffname" value="<?php echo $diffuser->Name; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Numéro de série / Serial number</label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                                <input class="form-control placeholder-no-fix num_serie" type="text" name="num_serie" value="<?php echo $diffuser->Num_serie; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Type</label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <input class="form-control" type="text" name="type" value="<?php echo $diffuser->Type; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Société / Company<span class="required"> * </span></label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <select name="company" id="select2_company_modal" class="select2 form-control">
                                <option value="">Sélectionnez / Select ...</option>
                                <?php
                                    $result = Users::selectCompany();
                                    foreach ($result as $company) {
                                        echo '<option';
                                        if ($diffuser->Company_Id == $company["Id"]) {echo " selected";}
                                        echo ' value="'.$company["Id"].'">'.$company["Name"].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Pays / Country<span class="required"> * </span></label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <select name="country" id="select2_country" class="select2 form-control">
                                <option value="" flag="zw">Sélectionnez / Select ...</option>
                                <?php
                                    $result = Location::getLocationList();
                                    foreach ($result as $pays) {
                                        echo '<option';
                                        if ($diffuser->Country == $pays["Id"]) {echo " selected";}
                                        ' value="'.$pays["Id"].'" flag="'.$pays['Flags'].'">'.$pays["Location"].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-md-3">Ville / City</label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <input class="form-control placeholder-no-fix" type="text" name="city" value="<?php echo $diffuser->City; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Réseau / Network<span class="required"> * </span></label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <select name="reseau" id="select2_reseau" class="select2 form-control">
                                <option value="">Sélectionnez / Select ...</option>
                                <?php
                                    $result = Users::selectReseau();
                                    foreach ($result as $reseau) {
                                        echo '<option';
                                        if ($diffuser->Reseau_Id == $reseau["Id"]) {echo " selected";}
                                        ' value="'.$reseau["Id"].'">'.$reseau["Name"].'</option>';
                                    }
                                ?>                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Couleur / Color</label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <input class="form-control" type="text" name="color" value="<?php echo $diffuser->Color; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Type de Pompe / Pump type</label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <input class="form-control" type="text" name="type_pump" value="<?php echo $diffuser->Type_Pump; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Numéro de la pompe / Pump number</label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <input class="form-control" type="text" name="num_pump" value="<?php echo $diffuser->Num_Pump; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Date de la pompe / Pump date</label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <input class="form-control date-picker" id="dp_pump" type="text" name="dp_pump" value="<?php echo $diffuser->Date_Pump; ?>" readonly>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php } ?>