<div class="container container-box">
    <div class="row">
        <div class="col"><h4 class="message"> Nouvelle agence</h4></div>
    </div>
    <!--<div id="new_ag">
    
        <div class="row" >
            <div class="col">
                <div class="progress">
                        <div class="progress-bar bg-success" style="width:30%"></div>
                    </div>
            </div>
            <div class="col">
                <div class="progress">
                        <div class="progress-bar bg-warning" style="width:30%"></div>
                    </div>
            </div>

        </div> <br>-->
      <?php  //echo validation_errors(); ?>
        <?php echo form_open_multipart('admin/nouvel_agence');?>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="denomi"><strong>Dénomination<span class="text-danger">*</span></strong> </label>
                    <input type="text"  name="denom" class="form-control" id="denomi"  value="<?php  echo set_value('denom'); ?>" placeholder="Rafiq voyage" >
                    <?php  echo form_error('denom'); ?>
                </div>
                <div class="form-group">
                    <label for="loc"><strong>Localité<span class="text-danger">*</span></strong></strong> </label>
                    <input type="text"  name="localite" class="form-control" id="loc"  value="<?php  echo set_value('localite'); ?>" placeholder="Ouagadougou">
                    <?php  echo form_error('localite'); ?>
                </div>
                <div class="form-group">
                    <label for="adr"><strong>Adresse<span class="text-danger">*</span></strong></strong> </label>
                    <input type="text"  name="adresse" class="form-control" id="adr" value="<?php  echo set_value('adresse'); ?>" placeholder="Ouagadougou 09 bp 237">
                    <?php  echo form_error('adresse'); ?>
                </div>
                
            </div><!--col1-->

            <div class="col-md-6">
                <div class="form-group">
                    <label for="telephone"><strong>Téléphone<span class="text-danger">*</span></strong></strong> </label>
                    <input type="text"  name="phone" class="form-control" id="telephone"  value="<?php  echo set_value('phone'); ?>">
                    <?php  echo form_error('phone'); ?>
                </div>
                <div class="form-group">
                    <label for="mail_ag"><strong>Mail<span class="text-danger">*</span></strong></strong> </label>
                    <input type="mail"  name="mail_ag" class="form-control" id="mail_ag" value="<?php  echo set_value('mail_ag'); ?>" >
                    <?php  echo form_error('mail_ag'); ?>
                </div>
                <div class="form-group">
                    <label for="log"><strong>Logo</strong> </label>
                    <input type="file"  name="logo" class="form-control" id="log" >
                </div>
                
            </div><!--col2-->
       </div>
        <div class="row">
            <div class="col d-flex justify-content-center"> <button type="submit" class="btn btn-success btn-lg" id="validation">  Valider </button></div>
        </div>
         <br>
        <?php echo form_close(); ?>
    </div>
</div>
