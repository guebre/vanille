<div class="container-fluid"> 
    <?php //$this->load->view('adminsyst/alert_plat') ; ?>
    <!--<div class="row">
        <div class="col-md-12">   <h4  class="text-center"> <u> Espace Vente </u>  </h4></div>
    </div>-->
   <div class="row">
       <div class="col bg-danger text-white text-center"> <h4>ESPACE VENTE </h4> </div>
   </div><br>
   <div class="container">
        <div class="row">
            <div class="col bg-info text-white"><h4> <?php echo $list->num_rows(); ?> Commandes en cours de validation </h4> </div>
        </div> <br>
        <div class="row">
            <div class="col-md-9 ml-auto">
                <form class="form-inline">
                    <label class="font-weight-bold text-uppercase" for="table-cli">  Choisir Numero de Table :  </label>
                    <select name="table-client" class="form-control" id="table-cli">
                        <option value=""> Numero de table du client  </option>
                        <?php foreach($list->result() as $item){ ?>
                               
                                <option value="<?php echo $item->id_table; ?>"> <?php echo $item->code_table; ?> </option>
                        <?php  } ?>
                    </select><?php echo nbs(4); ?>
                    <button class="btn btn-info" id="find_tab"> Rechercher </button>
                </form>
            </div>
        </div><br>
        <div class="row">
            <div class="col">
               <!--<table class="table table-bordered">
                 <thead>
                    <tr>
                       <th class="font-weight-bold"> Table Numero :  </th>
                       <th  colspan="3" class="text-right">    <button class="btn btn-danger"> Ajouter <i class="fas fa-plus"></i> </button>  </th>
                    <tr>
                    <tr> 
                       <th>Nom</th>
                       <th>Quantité</th>
                       <th>Prix</th>
                       <th>Total</th>
                    </tr>

                 </thead>
                 <tbody>
                    <tr>
                       <td> Article1 </td>
                       <td> 02</td>
                       <td> 250</td>
                       <td> 500 </td>
                    </tr>
                    <tr>
                       <td> Article2 </td>
                       <td> 1</td>
                       <td> 800</td>
                       <td> 800 </td>
                    </tr>
                    <tr>
                       <td colspan="3" class="text-center font-weight-bold"> Total </td>
                       <td> 1300 </td>
                    </tr>
                     
                    <tr>
                       <td colspan="4" class="text-right"> <button class="btn btn-danger"> Enregister Vente <i class="fas fa-plus"></i> </button>  </td>
                      
                    </tr>
                     
                 </tbody>
                
               </table>-->
            </div>
        </div>
        <div class="row">  
           <div class="col">
              <div id="row_commande">
                 
              </div>
           </div>         
        </div>
   </div>
   

   <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           Chargement ...
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
   

</div>