
<div class="container marge-top"> 
   <h4  class="text-center"> <u>LES  METS DE LA VANILLE </u>  </h4>

    <?php $this->load->view('adminsyst/alert_plat') ; ?>

   <div class="row">
        <div class="col-2">
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
            echo anchor('admin/plats',''.img($image_attribute_liste).'<span class="font-weight-bold"> Liste </span>',$attribute2) ;
            $attributes = array(
            'class' => 'list-group-item list-group-item-action',
            'role' => 'button'
            );
           $image_attributes = array(
               'src' => 'assets/images/New-file-icon.png',
               'alt' => 'image_cat',
               'class' =>''
            );
           echo anchor('admin/new_plat',''.img($image_attributes).'<span class="font-weight-bold"> Nouveau </span>',$attributes) ;
           ?>
        </div>
        <div class="col-10">   

            <?php 

             $this->load->view('adminsyst/liste_plats') ;
            
             echo $this->pagination->create_links();
            
            ?> 
             
        </div>

    </div>
</div>