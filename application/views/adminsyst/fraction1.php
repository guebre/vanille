<div id="message">  </div>

                <?php echo form_open("admin/add_category",array('id'=>'form_cat')); ?>
                  
                    <div class="form-group">
                        <label class="col-form-label" for="nom_cat"><span class="font-weight-bold">Nom Cat&eacute;gorie </span></label>
                        <input  name="nomCat" type="text" class="form-control form-control-lg" id="nom_cat" placeholder="Glace">
                    </div>
                    <!--<div class="form-group">
                        <label class="col-form-label" for="photo_cat"><span class="font-weight-bold">Photo</span></label>
                        <input  name="photo" type="file" class="form-control" id="photo_cat">
                    </div>-->
                    <div class="form-group">
                        <button class="btn btn-success btn-block" id="n_cat"> Enregister </button>
                    </div>

                <?php echo form_close(); ?>
