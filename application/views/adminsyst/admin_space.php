<?php
     $attributes = array(
      'class' => 'btn btn-light',
      'role' => 'button'
    );
?>
<div class="container-fluid accueil">
   <div class="row"> 
         <div class="col">
           <?php  
            $image_attributes = array(
               'src' => 'assets/images/User-Group-icon.png',
               'alt' => 'image_cat',
               'class' =>'image_categorie'
            );
            echo anchor('admin/users',''.img($image_attributes).'<span class="font-weight-bold"> USERS </span>'.nbs(0).'',$attributes);
           
          ?>
         </div>
         <div class="col">
          <?php  
            $image_attributes = array(
               'src' => 'assets/images/Blue-Stock-icon.png',
               'alt' => 'image_cat',
               'class' =>'image_categorie'
            );
            echo anchor('admin/setting',''.img($image_attributes).'<span class="font-weight-bold"> SETTING </span>',$attributes) ;
          ?>
         </div>
         <div class="col">
          <?php  
            $image_attributes = array(
               'src' => 'assets/images/Sale-icon.png',
               'alt' => 'image_cat',
               'class' =>'image_categorie'
            );
            echo anchor('admin/commande',''.img($image_attributes).'<span class="font-weight-bold"> VENTES </span>',$attributes) ;
          ?>
         </div>
   </div>
   <br>
   <div class="row align-items-center"> 
         <div class="col">
          <?php  
            $image_attributes = array(
               'src' => 'assets/images/Food-Dome-icon.png',
               'alt' => 'image_cat',
               'class' =>'image_categorie'
            );
            echo anchor('admin/plats',''.img($image_attributes).'<span class="font-weight-bold"> PLATS </span>',$attributes) ;
          ?>
         </div>
         <div class="col">
          <?php  
            $image_attributes = array(
               'src' => 'assets/images/question-type-drag-drop-icon.png',
               'alt' => 'image_cat',
               'class' =>'image_categorie'
            );
            echo anchor('admin/category',''.img($image_attributes).'<span class="font-weight-bold"> MENU </span>'.nbs(7).'',$attributes) ;
          ?>
         </div>
         <div class="col">
           <?php  
            $image_attributes = array(
               'src' => 'assets/images/Statistics-icon.png',
               'alt' => 'image_cat',
               'class' =>'image_categorie'
            );
            echo anchor('admin/etats',''.img($image_attributes).'<span class="font-weight-bold">  ETATS </span>'.nbs(3).'',$attributes) ; 
          ?>
         </div>
   </div>
</div>