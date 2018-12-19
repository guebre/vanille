<div class="container-fluid marge-top"> 
    <?php //$this->load->view('adminsyst/alert_plat') ; ?>
    <!--<div class="row">
        <div class="col-md-12">   <h4  class="text-center"> <u> Espace Vente </u>  </h4></div>
    </div>-->
    <div class="row">
         <div class="col" id="vente_status">  </div>
    </div>
    <div class="row">
       <div class="col bg-light text-danger text-center"> <h4>ESPACE COMMANDE </h4> </div>
   </div><br>
    <div class="row">
            <div class="col-md-6">
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
                            <input type="number" name="quantity" class="form-control quantity" id="'.$row->id_plat.'" /><br />
                            <button type="button" name="add_cart" class="btn btn-success add_cart" data-productname="'.$row->nom_plat.'" data-price="'.$row->prix.'" data-productid="'.$row->id_plat.'" />Ajouter au Panier </button>
                            </div>
                            ';
                        }
                        ?> 
                    </div>
            </div>           
            <div class="col-md-6">
                
                <div id="cart_details">

                </div>
            
              
            </div>
            
    </div>   
</div>