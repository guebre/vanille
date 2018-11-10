<?php 
   //var_dump($list->result());
?>

<div class="container marge-top"> 
   <h4  class="text-center"> <u> AJOUT D'UN UTILISATEUR </u>  </h4>
   <div class="row">
        <div class="col-4">
            <?php  
            $image_attributes = array(
                'src' => 'assets/images/New-file-icon.png',
                'alt' => 'image_cat',
                'class' =>''
            );
            $attributes = array(
                'class' => 'list-group-item list-group-item-action active',
                'role' => 'button'
            );
            echo anchor('admin/new_user',''.img($image_attributes).'<span class="font-weight-bold"> Nouveau </span>',$attributes) ;
            $attribute2 = array(
            'class' => 'list-group-item list-group-item-action',
            'role' => 'button'
            );
            $image_attribute_liste = array(
               'src' => 'assets/images/Food-List-Ingredients-icon.png',
               'alt' => 'image_cat',
               'class' =>''
            );
            echo anchor('admin/users',''.img($image_attribute_liste).'<span class="font-weight-bold"> Liste </span>',$attribute2) ;   
            ?>
        </div>    
       
        <div class="col-8">   
        <?php  echo validation_errors(); ?>

        <?php  if($success): ?>

           <div  id="form_erreur" class="alert alert-success alert-dismissible fade show" role="alert"><strong> 
                            <?php echo $message;  ?> 
                             </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>   
            </div>

        <?php  endif; ?>
           <?php echo form_open("admin/new_user",array('id'=>'new_user')); ?>
            
            <div class="form-group">
                <label class="col-form-label" for="login"><span class="font-weight-bold">Login </span></label>
                <input  name="login" type="text" class="form-control" id="login" placeholder="Pseudo" required>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="password"><span class="font-weight-bold">Password  </span></label>
                <input  name="password" type="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="password1"><span class="font-weight-bold">Confirm Password </span></label>
                <input  name="password1" type="password" class="form-control" id="password1" placeholder="Confirm Password" required>
            </div>
           
            <div class="form-group">
                <label class="col-form-label" for="role"><span class="font-weight-bold">Fonction </span></label>
                <select class="form-control" id="role" name="role">
                   <?php foreach($list->result() as $row): ?>
                   <option value="<?php echo $row->niveau ?>"> <?php echo $row->slug; ?> </option>
                   <?php endforeach; ?>
                </select>
            </div>

           
            <!--<div class="form-group">
                <label class="col-form-label" for="photo_cat"><span class="font-weight-bold">Photo</span></label>
                <input  name="photo" type="file" class="form-control" id="photo_cat">
            </div>-->
            <div class="form-group">
                <button class="btn btn-success btn-block" id="new_plat"> Enregister </button>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>


