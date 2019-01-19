<div id="accueil">
    <div class="container mt-5">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <?php  if ($login_fail == 'fail'): ?>
                    <div class="alert alert-danger alert-dismissible fade show " role="alert"><strong> 
                        Login ou password  incorrect </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>   
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php  echo form_open("accueil"); ?> 
        <div class="row justify-content-center">
            <div class="col-md-6 text-center"><span class="signin-fa"> <i class="fa fa-user fa-5x" ></i> </span></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <label for="usrname" class="col-form-label"><span class="signin-label">Email : </span></label>
                <input name="usrname" type="text" class="form-control"  id="usrname" placeholder="login" > 
                <?php echo form_error('usrname'); ?>  
            </div>    
        </div> 

        <div class="row justify-content-center">
            <div class="col-md-6">
                <label for="usrpass" class="col-form-label"> <span class="signin-label"> Password :  </span></label>
                <input name="usrpass" type="password"  class="form-control" id="usrpass" placeholder="yourpassword" > 
                <?php echo form_error('usrpass'); ?> 
            </div>  
        </div> 
        <div class="row justify-content-center">
            <div class="col-md-6">
                <br>
                <button class="btn btn-primary btn-sm btn-block" type="submit">Login</button>
            </div>

        </div>   
        <br>        
        <?php echo form_close(); ?> 
    </div>
</div>




