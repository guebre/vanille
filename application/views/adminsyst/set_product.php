<?php 

 //var_dump($produit->result());

  $prod = $produit->row();

?>
  <?php 
   //var_dump($list->result());

?>
<div class="container marge-top"> 
   <h4  class="text-center"> <u> Modification produit </u>  </h4>
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
            echo anchor('admin/new_product',''.img($image_attributes).'<span class="font-weight-bold"> Nouveau </span>',$attributes) ;
            $attribute2 = array(
            'class' => 'list-group-item list-group-item-action',
            'role' => 'button'
            );
            $image_attribute_liste = array(
               'src' => 'assets/images/Food-List-Ingredients-icon.png',
               'alt' => 'image_cat',
               'class' =>''
            );
            echo anchor('admin/product',''.img($image_attribute_liste).'<span class="font-weight-bold"> Liste </span>',$attribute2) ;   
            ?>
        </div>    
       
        <div class="col-8">   
        <?php  echo validation_errors(); ?>

        <?php  if($set_prod_status): ?>
           <div  id="form_erreur" class="alert alert-success alert-dismissible fade show" role="alert"><strong> 
                            <?php echo $set_prod_message; ?> 
                             </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>   
            </div>
        <?php  endif; ?>
           <?php echo form_open("",array('id'=>'set_p')); ?>
            
            <div class="form-group">
                <label class="col-form-label" for="nom_p"><span class="font-weight-bold">Nom Produit </span></label>
                <input  name="nom_p" type="text" class="form-control" id="nom_cat" placeholder="THE" required value="<?php echo $prod->nom_prod; ?>">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="p_unit"><span class="font-weight-bold">Prix Unitaire </span></label>
                <input  name="p_unit" type="number" class="form-control " id="p_unit" placeholder="100" required value="<?php echo $prod->prix_unit; ?>">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="qte"><span class="font-weight-bold">Quantit&eacute </span></label>
                <input  name="qte" type="number" class="form-control" id="qte" placeholder="100" required  value="<?php echo $prod->quantite; ?>">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="qte_seuil"><span class="font-weight-bold">Niveau de Seuil </span></label>
                <input  name="qte_seuil" type="number" class="form-control" id="qte_seuil" placeholder="100" required value="<?php echo $prod->qte_alert; ?>">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="p_categorie"><span class="font-weight-bold">Cat&eacutegorie </span></label>
                <select class="form-control" id="p_categorie" name="p_categorie">
                   <?php foreach($list->result() as $row): ?>
                   <option  value="<?php echo $row->id_cat ?>" <?php echo ($row->id_cat==$prod->categorie) ? 'selected' :''; ?> > <?php echo $row->nom_cat; ?> </option>
                   <?php endforeach; ?>
                </select>
            </div>
            <!--<div class="form-group">
                <label class="col-form-label" for="photo_cat"><span class="font-weight-bold">Photo</span></label>
                <input  name="photo" type="file" class="form-control" id="photo_cat">
            </div>-->
            <div class="form-group">
                <button class="btn btn-success btn-block" id="n_cat"> Enregister </button>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>




?>