<div class="container marge-top"> 
  
   <div class="row">
        <div class="col-4">
          <?php  
            $attribute2 = array(
            'class' => 'list-group-item list-group-item-action active',
            'role' => 'button'
            );
            $image_attribute_liste = array(
                'src' => 'assets/images/Food-List-Ingredients-icon.png',
                'alt' => 'image_cat',
                'class' =>''
            );
            echo anchor('admin/plats',''.img($image_attribute_liste).'<span class="font-weight-bold"> Liste des plats </span>',$attribute2) ;
            $attributes = array(
            'class' => 'list-group-item list-group-item-action',
            'role' => 'button'
            );
           $image_attributes = array(
               'src' => 'assets/images/New-file-icon.png',
               'alt' => 'image_cat',
               'class' =>''
            );
           echo anchor('admin/new_plat',''.img($image_attributes).'<span class="font-weight-bold"> Nouveau plat </span>',$attributes) ;
           ?>
        </div>
        <div class="col-8">   

            <?php if($success == 'fail'): ?>
                <div  id="form_erreur" class="alert alert-danger alert-dismissible fade show" role="alert"><strong> 
                                <?php echo $message ; ?> 
                                </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>   
                </div>
            <?php endif; ?>  

            <?php if($success == 'success'): ?>
                <div  id="form_erreur" class="alert alert-success alert-dismissible fade show" role="alert"><strong> 
                                <?php echo $message ; ?> 
                                </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>   
                </div>
            <?php endif; ?>  

        </div>
    </div>
</div>


     
  