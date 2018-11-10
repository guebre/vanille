<div class="container-fluid container-box"> 

    <?php foreach($list_data as $row){ ?>

      <table class="table table-hover table-responsive">

        <thead class="table-info"> 
          <tr>
             <th scope="col">#</th>
             <th scope="col">Agence</th>
             <th scope="col"> Localité</th>
             <th scope="col"> Adresse</th>
             <th scope="col"> Telephone </th>
             <th scope="col"> Email </th>
             <th scope="col"> Date Début </th>
             <th scope="col"> Date Fin </th>
             <th scope="col"> Action</th>
          </tr>
        </thead> 
        <tbody>
           <tr>
              <th> <?php //echo $row->id_ag; ?> </th>
              <th> <?php echo $row->denom_ag; ?> </th>
              <th> <?php echo $row->localite_ag; ?> </th>
              <th> <?php echo $row->adresse_ag; ?> </th>
              <th> <?php echo $row->telephone_ag; ?> </th>
              <th> <?php echo $row->email_ag ;?> </th>
  
              <th> <?php echo $row->date_debut ; ?> </th>
              <?php 
                 // Traitement de la date de fin d'abonnement
                 $today = date("Y-m-d H:i:s");
          
                 $champ = 'text-success';
                 if( $row->date_fin < $today){
                      $champ = 'text-danger';  
                 }   
              ?>
              
              <th class="<?php echo $champ ?>"> <?php echo $row->date_fin ; ?> </th>
              <th><button class="btn btn-info btn-sm"> Détails </button> | 
             
              <?php if((int) $row->statut_ag === 1){
                 echo anchor('admin/delete_status/'.$row->id_ag, 'D&eacuteactiver', array('class' =>'btn btn-danger btn-sm'));
                } else {
                    echo anchor('admin/set_status/'.$row->id_ag, 'Activer', array('class' =>'btn btn-success btn-sm'));    
                  } 
              ?>
           <tr>

        </tbody>
      </table>
        
     <?php  }  ?>
     <?php //var_dump($list_data);  ?>

</div>

