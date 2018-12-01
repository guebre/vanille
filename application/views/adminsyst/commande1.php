<div class="container-fluid"> 
    <!--<div class="row"> 
            <div class="col-md-12">-->
                <!--<h3 class="text-center text-success" >Espace vente</h3><br />-->
                <?php  echo $this->pagination->create_links(); ?>
                    <div class="row">
                        <?php
                        foreach($list as  $row)
                        {
                            echo '
                            <div class="col-md-4 text-center" style="padding:16px; background-color:#f1f1f1; border:1px solid #ccc;">
                            <h6>'.$row->nom_plat.'</h6>
                            <h5 class="text-danger">'.$row->prix.' Cfa</h5>
                            <input type="number" name="quantity" class="form-control" id="i_'.$row->id_plat.'"/><br/>
                            <button type="button" name="add_cart1" class="btn btn-success add_cart1"  data-productname1="'.$row->nom_plat.'" data-price1="'.$row->prix.'" data-productid1="'.$row->id_plat.'">Ajouter à la commande  </button>
                            </div>
                            ';
                        }
                        ?> 
                    </div>
           <!-- </div>                  
    </div>  --> 
</div>