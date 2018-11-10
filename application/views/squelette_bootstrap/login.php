<div class="container" id="signin">

    <?php  echo  form_open('adminsysteme/login'); ?> 
    <div class="row">
        <div class="col-md-12 text-center"><i class="fa fa-user fa-5x" aria-hidden="true"></i></div>
    </div>
    <div class="row">
        <div class="col-md-6 ml-md-auto">
            <label for="usrname" class="col-form-label"> Email : </label>
            <input name="usrname" type="text" class="form-control"  id="usrname" placeholder="yourmail@hotmail.com" >   
        </div>   
        <div class="col-md-3 col-lg-3">
        </div>  
    </div> 
    <br>
    <div class="row">
        <div class="col-md-6 ml-md-auto">
            <label for="usrpass" class="col-form-label"> Password : </label>
            <input name="usrpass" type="password"  class="form-control" id="usrpass" placeholder="yourpassword" > 
        </div>  
        <div class="col-md-3 col-lg-3">
        </div> 
    </div> 
    <br>
    <div class="row">
        <div class="col-md-6 ml-md-auto">
            <button class="btn btn-success btn-sm btn-block" type="submit">Login</button>
        </div>
        <div class="col-md-3 col-lg-3">
        </div> 

    </div>           
        
    <?php echo form_close(); ?>
      
</div>

