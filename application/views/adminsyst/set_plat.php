<?php 
   //var_dump($list->result());
   $plat = $plat->row();
?>

<div class="container marge-top"> 
   <h4  class="text-center"> <u> Modification de Plat:</u> &nbsp; <span class="text-danger">  <?php  echo $plat->nom_plat; ?></span> </h4>
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
            echo anchor('admin/new_plat',''.img($image_attributes).'<span class="font-weight-bold"> Nouveau plat </span>',$attributes) ;
            $attribute2 = array(
            'class' => 'list-group-item list-group-item-action',
            'role' => 'button'
            );
            $image_attribute_liste = array(
               'src' => 'assets/images/Food-List-Ingredients-icon.png',
               'alt' => 'image_cat',
               'class' =>''
            );
            echo anchor('admin/plats',''.img($image_attribute_liste).'<span class="font-weight-bold"> Liste des plats </span>',$attribute2) ;   
            ?>
        </div>    
       
        <div class="col-8">   
        <?php  echo validation_errors(); ?>
        
           <?php echo form_open("",array('id'=>'new_p')); ?>
            
           <div class="form-group">
                <!--<label class="col-form-label" for="nom_plat"><span class="font-weight-bold">identifiant  </span></label>-->
                <input  name="identifiant" type="number" class="form-control form-control-sm" id="identifiant" placeholder="THE" required value="<?php echo $plat->id_plat; ?>"  hidden>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="nom_plat"><span class="font-weight-bold">Nom Plat </span></label>
                <input  name="nom_plat" type="text" class="form-control form-control-sm" id="nom_plat" placeholder="THE" required value="<?php echo $plat->nom_plat; ?>">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="prix"><span class="font-weight-bold">Prix </span></label>
                <input  name="prix" type="number" class="form-control form-control-sm " id="prix" placeholder="100" required value="<?php echo $plat->prix; ?>" >
            </div>
            <div class="form-group">
                <label class="col-form-label" for="p_categorie"><span class="font-weight-bold">Cat&eacutegorie </span></label>
                <select class="form-control form-control-sm" id="p_categorie" name="categorie">
                   <?php foreach($list->result() as $row): ?>
                   <option value="<?php echo $row->id_cat ;?>" <?php echo ($row->id_cat === $plat->id_cat) ? 'selected' : '' ; ?> > <?php echo $row->nom_cat; ?>  </option>
                   <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="qte"><span class="font-weight-bold">Quantit&eacute </span></label>
                <input  name="qte" type="number" class="form-control form-control-sm" id="qte" placeholder="100" required  value="<?php echo $plat->quantite; ?>">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="qte_seuil"><span class="font-weight-bold">Niveau de Seuil </span></label>
                <input  name="qte_seuil" type="number" class="form-control form-control-sm" id="qte_seuil" placeholder="100" required value="<?php echo $plat->quantite_seuil; ?>">
            </div>


           
            <!--<div class="form-group">
                <label class="col-form-label" for="photo_cat"><span class="font-weight-bold">Photo</span></label>
                <input  name="photo" type="file" class="form-control" id="photo_cat">
            </div>-->
            <div class="form-group">
                <button class="btn btn-success btn-block" id="n_cat"> Modifier  </button>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>


