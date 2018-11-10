<?php if($success == 'success'): ?>
                <div  id="form_erreur" class="alert alert-success alert-dismissible fade show" role="alert"><strong> 
                                <?php echo $message ; ?> 
                                </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>   
                </div>
<?php endif; ?>  

<?php if($success == 'fail'): ?>
                <div  id="form_erreur" class="alert alert-danger alert-dismissible fade show" role="alert"><strong> 
                                <?php echo $message ; ?> 
                                </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>   
                </div>
<?php endif; ?>  

