<div class="row">
      <div class="col"> 
            <?php  if($set_prod_status): ?>
            <div  class="alert alert-danger alert-dismissible fade show" role="alert"> 
                            <?php  echo $set_prod_message; ?> 
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>   
            </div>
            <?php  endif; ?>

             <?php  if($delete_success): ?>
            <div  class="alert alert-success alert-dismissible fade show" role="alert"><strong> 
                            <?php echo $message;  ?> 
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>   
            </div>
            <?php  endif; ?>
      </div>
  </div>
