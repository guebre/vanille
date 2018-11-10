<?php 
   //var_dump($list->result());
?>

<div class="container marge-top"> 
   <h4  class="text-center"> <u> AJOUT DE TABLE </u>  </h4>
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
            echo anchor('admin/new_table',''.img($image_attributes).'<span class="font-weight-bold"> Nouveau </span>',$attributes) ;
            $attribute2 = array(
            'class' => 'list-group-item list-group-item-action',
            'role' => 'button'
            );
            $image_attribute_liste = array(
               'src' => 'assets/images/Food-List-Ingredients-icon.png',
               'alt' => 'image_cat',
               'class' =>''
            );
            echo anchor('admin/setting',''.img($image_attribute_liste).'<span class="font-weight-bold"> Liste </span>',$attribute2) ;   
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
           <?php echo form_open("admin/new_table",array('id'=>'new_p')); ?>
            
            <div class="form-group">
                <label class="col-form-label" for="code"><span class="font-weight-bold">Code Table</span></label>
                <input  name="code" type="text" class="form-control" id="code" placeholder="01" required>
            </div>
            <!--<div class="form-group">
                <label class="col-form-label" for="chaise"><span class="font-weight-bold">Nombre de chaise </span></label>
                <input  name="chaise" type="number" class="form-control form-control-sm " id="chaise" placeholder="100" required >
            </div>-->
            
            <div class="form-group">
                <button class="btn btn-success btn-block" id="new_table"> Enregister </button>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>


