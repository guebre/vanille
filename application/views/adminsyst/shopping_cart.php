<div class="container marge-top">
    <div class="row">
         <div class="col" id="vente_status">  </div>
    </div>
    <div class="row">
            <div class="col-6">
                <!--<h3 class="text-center text-success" >Espace vente</h3><br />-->
                <?php  echo $this->pagination->create_links(); ?>
                    <div class="table-responsive row">
                        <?php
                        foreach($list as  $row)
                        {
                            echo '
                            <div class="col-md-4 text-center" style="padding:16px; background-color:#f1f1f1; border:1px solid #ccc;">
                            <h6>'.$row->nom_plat.'</h6>
                            <h5 class="text-danger">'.$row->prix.' Cfa</h5>
                            <input type="number" name="quantity" class="form-control quantity" id="'.$row->id_plat.'" /><br />
                            <button type="button" name="add_cart" class="btn btn-success add_cart" data-productname="'.$row->nom_plat.'" data-price="'.$row->prix.'" data-productid="'.$row->id_plat.'" /><!--Add to Cart--> Ajouter au Panier </button>
                            </div>
                            ';
                        }
                        ?> 
                    </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div id="cart_details">
                    <!--<h3 class="text-center">Cart is Empty</h3>-->
                </div>
            </div>
    </div> 
</div>
 